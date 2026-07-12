<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalLaporan = Laporan::count();
        $menunggu = Laporan::where('status', 'Menunggu')->count();
        $diproses = Laporan::where('status', 'Diproses')->count();
        $selesai = Laporan::where('status', 'Selesai')->count();

        $laporanTerbaru = Laporan::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('totalLaporan', 'menunggu', 'diproses', 'selesai', 'laporanTerbaru'));
    }

    public function indexLaporan()
    {
        $laporans = Laporan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.laporan.index', compact('laporans'));
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

        return redirect()->route('admin.laporan.show', $id)->with('success', 'Status laporan berhasil diperbarui.');
    }
}
