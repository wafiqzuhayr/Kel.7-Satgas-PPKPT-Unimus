<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'no_hp' => 'required|numeric|digits_between:11,13',
            'nik_nim' => 'required|string',
            'status_pelapor' => 'required|in:Dosen,Tenaga Kependidikan,Mahasiswa,Lainnya',
            'unit_kerja_prodi' => 'required|string',
            'kategori_aduan' => 'required|in:Kekerasan Fisik,Kekerasan Psikis,Perundungan,Kekerasan Seksual,Diskiriminasi dan Intimidasi,Kebijakan yang Mengandung Kekerasan,Lainnya',
            'alasan_pengaduan' => 'required|string',
            'kebutuhan_penyintas' => 'required|string',
            'waktu_kejadian' => 'required|string',
            'tempat_kejadian' => 'required|string',
            'kronologi' => 'required|string',
            'pihak_terlibat' => 'nullable|string',
            'bukti_file' => 'nullable|file|mimes:png,jpg,jpeg,pdf,doc,docx|max:10240',
            'bersedia_dihubungi' => 'required|boolean',
        ]);

        $laporanId = 'RPT-' . date('Ym') . '-' . strtoupper(substr(uniqid(), -4));

        $buktiPath = null;
        if ($request->hasFile('bukti_file')) {
            try {
                $file = $request->file('bukti_file');
                $fileName = $laporanId . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/bukti'), $fileName);
                $buktiPath = 'uploads/bukti/' . $fileName;
            } catch (\Exception $e) {
                // Pada Vercel (Read-Only filesystem), abaikan file bukti agar laporan tetap bisa disubmit
                $buktiPath = null;
            }
        }

        Laporan::create([
            'id' => $laporanId,
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'nik_nim' => $request->nik_nim,
            'status_pelapor' => $request->status_pelapor,
            'unit_kerja_prodi' => $request->unit_kerja_prodi,
            'kategori_aduan' => $request->kategori_aduan,
            'alasan_pengaduan' => $request->alasan_pengaduan,
            'kebutuhan_penyintas' => $request->kebutuhan_penyintas,
            'waktu_kejadian' => $request->waktu_kejadian,
            'tempat_kejadian' => $request->tempat_kejadian,
            'kronologi' => $request->kronologi,
            'pihak_terlibat' => $request->pihak_terlibat,
            'bukti_file' => $buktiPath,
            'bersedia_dihubungi' => $request->bersedia_dihubungi,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('buat_pengaduan')->with('success', 'Laporan Anda telah berhasil dikirim. Harap simpan ID Laporan berikut untuk melacak perkembangan kasus: ' . $laporanId);
    }

    public function search(Request $request)
    {
        $request->validate([
            'kode_laporan' => 'required|string'
        ]);

        $laporan = Laporan::find($request->kode_laporan);

        if (!$laporan) {
            return redirect()->route('lacak_kasus')->with('error', 'ID Laporan tidak ditemukan. Pastikan Anda memasukkan kode dengan benar.');
        }

        return view('pages.lacak_kasus', compact('laporan'));
    }
}
