<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private function hasTipeColumn()
    {
        try {
            if (!\Illuminate\Support\Facades\Schema::hasColumn('laporans', 'tipe_pengaduan')) {
                \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                return \Illuminate\Support\Facades\Schema::hasColumn('laporans', 'tipe_pengaduan');
            }
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public function dashboard()
    {
        $totalLaporan = Laporan::count();
        $menunggu = Laporan::where('status', 'Menunggu')->count();
        $diproses = Laporan::where('status', 'Diproses')->count();
        $selesai = Laporan::where('status', 'Selesai')->count();

        $hasTipe = $this->hasTipeColumn();

        $countPPKPT = $hasTipe ? Laporan::where(function($q) {
            $q->where('tipe_pengaduan', 'Satgas PPKPT')->orWhereNull('tipe_pengaduan');
        })->count() : $totalLaporan;
        $countSafety = $hasTipe ? Laporan::where('tipe_pengaduan', 'Student Safety')->count() : 0;

        $laporanTerbaru = Laporan::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('totalLaporan', 'menunggu', 'diproses', 'selesai', 'countPPKPT', 'countSafety', 'laporanTerbaru'));
    }

    public function indexLaporan(Request $request)
    {
        $tipe = $request->query('tipe');
        $query = Laporan::query();
        $hasTipe = $this->hasTipeColumn();

        if ($hasTipe && $tipe === 'satgas_ppkpt') {
            $query->where(function($q) {
                $q->where('tipe_pengaduan', 'Satgas PPKPT')->orWhereNull('tipe_pengaduan');
            });
        } elseif ($hasTipe && $tipe === 'student_safety') {
            $query->where('tipe_pengaduan', 'Student Safety');
        }

        $laporans = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        $countAll = Laporan::count();
        $countPPKPT = $hasTipe ? Laporan::where(function($q) {
            $q->where('tipe_pengaduan', 'Satgas PPKPT')->orWhereNull('tipe_pengaduan');
        })->count() : $countAll;
        $countSafety = $hasTipe ? Laporan::where('tipe_pengaduan', 'Student Safety')->count() : 0;

        return view('admin.laporan.index', compact('laporans', 'tipe', 'countAll', 'countPPKPT', 'countSafety'));
    }

    public function exportExcel(Request $request)
    {
        $tipe = $request->query('tipe');
        $query = Laporan::query();
        $hasTipe = $this->hasTipeColumn();

        if ($hasTipe && $tipe === 'satgas_ppkpt') {
            $query->where(function($q) {
                $q->where('tipe_pengaduan', 'Satgas PPKPT')->orWhereNull('tipe_pengaduan');
            });
            $fileName = 'Data_Laporan_Satgas_PPKPT_' . date('Ymd_His') . '.csv';
        } elseif ($hasTipe && $tipe === 'student_safety') {
            $query->where('tipe_pengaduan', 'Student Safety');
            $fileName = 'Data_Laporan_Student_Safety_' . date('Ymd_His') . '.csv';
        } else {
            $fileName = 'Data_Semua_Laporan_' . date('Ymd_His') . '.csv';
        }

        $laporans = $query->orderBy('created_at', 'desc')->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $columns = [
            'ID Laporan',
            'Tipe Pengaduan',
            'Tanggal Dibuat',
            'Nama Pelapor',
            'No. HP (WhatsApp)',
            'NIK / NIM',
            'Status Pelapor',
            'Unit Kerja / Prodi',
            'Kategori Aduan',
            'Alasan Pengaduan',
            'Kebutuhan Penyintas',
            'Waktu Kejadian',
            'Tempat Kejadian',
            'Kronologi',
            'Pihak Terlibat',
            'Bersedia Dihubungi',
            'Status Laporan',
            'Catatan Satgas'
        ];

        $callback = function() use ($laporans, $columns) {
            $file = fopen('php://output', 'w');
            // Write UTF-8 BOM for Excel compatibility
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            fputcsv($file, $columns, ';');

            foreach ($laporans as $row) {
                fputcsv($file, [
                    $row->id,
                    $row->tipe_pengaduan ?? 'Satgas PPKPT',
                    $row->created_at ? $row->created_at->format('d-m-Y H:i:s') : '',
                    $row->nama,
                    "'" . $row->no_hp,
                    "'" . $row->nik_nim,
                    $row->status_pelapor,
                    $row->unit_kerja_prodi,
                    $row->kategori_aduan,
                    $row->alasan_pengaduan,
                    $row->kebutuhan_penyintas,
                    $row->waktu_kejadian,
                    $row->tempat_kejadian,
                    $row->kronologi,
                    $row->pihak_terlibat ?? '-',
                    $row->bersedia_dihubungi ? 'Ya' : 'Tidak',
                    $row->status,
                    $row->catatan_satgas ?? '-'
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function showLaporan($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.laporan.show', compact('laporan'));
    }

    public function updateLaporan(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai',
            'catatan_satgas' => 'nullable|string',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'status' => $request->status,
            'catatan_satgas' => $request->catatan_satgas,
        ]);

        $webhookUrl = env('EXCEL_WEBHOOK_URL') ?: env('EXCEL_ONLINE_WEBHOOK_URL');
        if ($webhookUrl) {
            try {
                \Illuminate\Support\Facades\Http::timeout(5)->post($webhookUrl, [
                    'event' => 'laporan.updated',
                    'id' => $laporan->id,
                    'tipe_pengaduan' => $laporan->tipe_pengaduan ?? 'Satgas PPKPT',
                    'nama' => $laporan->nama,
                    'status' => $laporan->status,
                    'catatan_satgas' => $laporan->catatan_satgas ?? '-',
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } catch (\Throwable $e) {}
        }

        return redirect()->route('admin.laporan.show', $id)->with('success', 'Status laporan berhasil diperbarui.');
    }

    public function apiExcelFeed(Request $request)
    {
        $tipe = $request->query('tipe');
        $query = Laporan::query();

        try {
            if (\Illuminate\Support\Facades\Schema::hasColumn('laporans', 'tipe_pengaduan')) {
                if ($tipe === 'satgas_ppkpt') {
                    $query->where(function($q) {
                        $q->where('tipe_pengaduan', 'Satgas PPKPT')->orWhereNull('tipe_pengaduan');
                    });
                } elseif ($tipe === 'student_safety') {
                    $query->where('tipe_pengaduan', 'Student Safety');
                }
            }
        } catch (\Throwable $e) {}

        $laporans = $query->orderBy('created_at', 'desc')->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Access-Control-Allow-Origin' => '*',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ];

        $columns = [
            'ID Laporan', 'Tipe Pengaduan', 'Tanggal Dibuat', 'Nama Pelapor',
            'No. HP (WhatsApp)', 'NIK / NIM', 'Status Pelapor', 'Unit Kerja / Prodi',
            'Kategori Aduan', 'Alasan Pengaduan', 'Kebutuhan Penyintas',
            'Waktu Kejadian', 'Tempat Kejadian', 'Kronologi', 'Pihak Terlibat',
            'Bersedia Dihubungi', 'Status Laporan', 'Catatan Satgas'
        ];

        $callback = function() use ($laporans, $columns) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, $columns, ',');

            foreach ($laporans as $row) {
                fputcsv($file, [
                    $row->id,
                    $row->tipe_pengaduan ?? 'Satgas PPKPT',
                    $row->created_at ? $row->created_at->format('Y-m-d H:i:s') : '',
                    $row->nama,
                    "'" . $row->no_hp,
                    "'" . $row->nik_nim,
                    $row->status_pelapor,
                    $row->unit_kerja_prodi,
                    $row->kategori_aduan,
                    $row->alasan_pengaduan,
                    $row->kebutuhan_penyintas,
                    $row->waktu_kejadian,
                    $row->tempat_kejadian,
                    $row->kronologi,
                    $row->pihak_terlibat ?? '-',
                    $row->bersedia_dihubungi ? 'Ya' : 'Tidak',
                    $row->status,
                    $row->catatan_satgas ?? '-'
                ], ',');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
