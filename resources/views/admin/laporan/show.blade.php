@extends('layouts.admin')

@section('title', 'Detail Laporan')
@section('page_title', 'Detail Laporan: ' . $laporan->id)

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Kolom Kiri: Detail Data -->
    <div class="lg:col-span-2 space-y-6">
        
        <!-- Bagian 1: Identitas Pelapor -->
        <div class="bg-white border border-white/40 rounded-3xl p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] backdrop-blur-xl relative overflow-hidden group hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300">
            <h3 class="text-xs font-black text-[#0f295a] uppercase tracking-wider mb-5 border-b border-slate-100 pb-3 flex items-center gap-2">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-blue-100 text-blue-700 text-[10px]">1</span>
                Identitas Pelapor
            </h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-6">
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Nama Lengkap</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->nama }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Status Pelapor</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->status_pelapor }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">NIK / NIM</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->nik_nim }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Unit Kerja / Program Studi</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->unit_kerja_prodi }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Nomor HP</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->no_hp }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Ketersediaan Dihubungi</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">
                        @if($laporan->bersedia_dihubungi)
                            <span class="text-emerald-600">Ya, Bersedia</span>
                        @else
                            <span class="text-red-600">Tidak Bersedia</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Bagian 2: Konteks & Kebutuhan -->
        <div class="bg-white border border-white/40 rounded-3xl p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] backdrop-blur-xl relative overflow-hidden group hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300">
            <h3 class="text-xs font-black text-[#0f295a] uppercase tracking-wider mb-5 border-b border-slate-100 pb-3 flex items-center gap-2">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-indigo-100 text-indigo-700 text-[10px]">2</span>
                Konteks Pengaduan
            </h3>
            
            <div class="space-y-4">
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Kategori Aduan</p>
                    <p class="text-sm font-bold text-slate-800 mt-1 inline-flex bg-slate-100 px-3 py-1 rounded-md">{{ $laporan->kategori_aduan }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Alasan Pengaduan</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->alasan_pengaduan }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Kebutuhan Penyintas</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->kebutuhan_penyintas }}</p>
                </div>
            </div>
        </div>

        <!-- Bagian 3: Rincian Kejadian -->
        <div class="bg-white border border-white/40 rounded-3xl p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] backdrop-blur-xl relative overflow-hidden group hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300">
            <h3 class="text-xs font-black text-[#0f295a] uppercase tracking-wider mb-5 border-b border-slate-100 pb-3 flex items-center gap-2">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-emerald-100 text-emerald-700 text-[10px]">3</span>
                Rincian Kejadian
            </h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Waktu Kejadian</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->waktu_kejadian }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Lokasi / Tempat Kejadian</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->tempat_kejadian }}</p>
                </div>
            </div>

            <div class="mb-6">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Kronologi Kejadian</p>
                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-sm text-slate-700 leading-relaxed font-medium">
                    {!! nl2br(e($laporan->kronologi)) !!}
                </div>
            </div>

            @if($laporan->pihak_terlibat)
            <div class="mb-6">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Pihak yang Terlibat</p>
                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-sm text-slate-700 font-medium">
                    {!! nl2br(e($laporan->pihak_terlibat)) !!}
                </div>
            </div>
            @endif

            @if($laporan->bukti_file)
            <div class="mt-6 pt-5 border-t border-slate-100">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Lampiran Bukti</p>
                <a href="{{ asset($laporan->bukti_file) }}" target="_blank" class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-blue-100 transition-colors">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                    Lihat Lampiran File Pendukung
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Kolom Kanan: Aksi Satgas -->
    <div>
        <div class="bg-[#0f295a] rounded-3xl p-6 shadow-md sticky top-6">
            <h3 class="text-xs font-black text-white uppercase tracking-wider mb-5 border-b border-white/10 pb-3 flex items-center gap-2">
                <svg class="h-4 w-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                Tindakan Satgas
            </h3>

            <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-2">Status Penanganan</label>
                    <select name="status" class="w-full bg-white/10 border border-white/20 text-white rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 font-bold [&>option]:text-slate-800">
                        <option value="Menunggu" {{ $laporan->status == 'Menunggu' ? 'selected' : '' }}>Menunggu (Baru)</option>
                        <option value="Diproses" {{ $laporan->status == 'Diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                        <option value="Selesai" {{ $laporan->status == 'Selesai' ? 'selected' : '' }}>Selesai / Ditutup</option>
                    </select>
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-2">Catatan Tambahan (Bisa dilihat Pelapor)</label>
                    <textarea name="catatan_satgas" rows="5" class="w-full bg-white/10 border border-white/20 text-white rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 font-medium resize-none placeholder-white/30" placeholder="Berikan catatan progres penanganan...">{{ $laporan->catatan_satgas }}</textarea>
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-yellow-400 hover:bg-yellow-500 px-6 py-3.5 text-xs font-black text-[#0f295a] shadow-md transition-all">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
