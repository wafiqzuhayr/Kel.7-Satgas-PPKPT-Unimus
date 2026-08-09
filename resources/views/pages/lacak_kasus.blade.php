@extends('layouts.app')

@section('title', 'Lacak Kasus | Satgas PPKPT UNIMUS')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 mt-8 mb-16">
    <div class="mb-10 text-center">
        <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-50 px-3 py-1 text-xs font-bold text-blue-600 mb-3">
            Pemantauan Laporan
        </span>
        <h1 class="text-3xl font-black text-[#0f295a] tracking-tight">Lacak Status Kasus</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium max-w-xl mx-auto">Pantau perkembangan laporan pengaduan Anda secara real-time dan transparan. Masukkan ID Laporan Anda di bawah ini.</p>
    </div>

    <!-- Search Form -->
    <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] mb-8">
        <form action="{{ route('lacak_kasus.search') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
            <div class="relative flex-grow">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>
                <input type="text" name="kode_laporan" required placeholder="Masukkan ID Laporan (Contoh: RPT-12345)" class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl pl-12 pr-4 py-3.5 text-xs focus:outline-none focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 transition-all font-bold">
            </div>
            <button type="submit" class="shrink-0 inline-flex justify-center items-center gap-2 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-600 hover:from-blue-800 hover:to-indigo-700 px-8 py-3.5 text-xs font-bold text-white shadow-md hover:shadow-lg active:scale-95 transition-all cursor-pointer uppercase tracking-wider">
                Cari Kasus
            </button>
        </form>

        @if(session('error'))
            <div class="mt-5 bg-red-50 border border-red-100 text-red-600 text-xs px-4 py-3.5 rounded-xl font-medium shadow-sm flex items-start gap-2">
                <svg class="h-4 w-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>

    <!-- Search Results / Tracking Timeline -->
    @if(isset($laporan))
    <div class="bg-white border border-slate-100 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        <div class="bg-[#f8fafc] border-b border-slate-100 px-8 py-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">ID Laporan</p>
                <div class="flex items-center gap-2">
                    <h2 class="text-xl font-black text-[#0f295a]">{{ $laporan->id }}</h2>
                    <button type="button" data-copy="{{ $laporan->id }}" data-copy-msg="Anda telah berhasil menyalin ID Laporan ({{ $laporan->id }}) ke clipboard!" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-700 text-[11px] font-bold transition-all active:scale-95 cursor-pointer" title="Salin ID Laporan">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                        Salin
                    </button>
                </div>
            </div>
            <div class="text-left md:text-right">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Status Saat Ini</p>
                <span class="inline-flex items-center gap-1.5 rounded-full border px-4 py-1.5 text-xs font-black tracking-wider uppercase
                    @if($laporan->status == 'Menunggu') bg-amber-50 border-amber-200 text-amber-700
                    @elseif($laporan->status == 'Diproses') bg-blue-50 border-blue-200 text-blue-700
                    @elseif($laporan->status == 'Selesai') bg-emerald-50 border-emerald-200 text-emerald-700
                    @endif">
                    <span class="h-1.5 w-1.5 rounded-full @if($laporan->status == 'Menunggu') bg-amber-500 @elseif($laporan->status == 'Diproses') bg-blue-500 @elseif($laporan->status == 'Selesai') bg-emerald-500 @endif"></span>
                    {{ $laporan->status }}
                </span>
            </div>
        </div>

        <div class="p-8">
            <!-- Simple Status Visualizer -->
            <div class="relative mb-8 max-w-lg mx-auto">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="h-0.5 w-full bg-slate-100"></div>
                </div>
                <div class="relative flex justify-between">
                    <!-- Menunggu -->
                    <div>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-white ring-4 ring-white shadow-md">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                        </div>
                    </div>
                    
                    <!-- Diproses -->
                    <div>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full @if($laporan->status == 'Diproses' || $laporan->status == 'Selesai') bg-blue-600 text-white shadow-md @else bg-slate-100 border-2 border-slate-200 text-slate-400 @endif ring-4 ring-white">
                            @if($laporan->status == 'Diproses' || $laporan->status == 'Selesai')
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                            @else
                            <span class="text-xs font-bold">2</span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Selesai -->
                    <div>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full @if($laporan->status == 'Selesai') bg-emerald-500 text-white shadow-md @else bg-slate-100 border-2 border-slate-200 text-slate-400 @endif ring-4 ring-white">
                            @if($laporan->status == 'Selesai')
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                            @else
                            <span class="text-xs font-bold">3</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Laporan info -->
            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6">
                <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-4 border-b border-slate-200 pb-2">Rincian Laporan</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-6">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Kategori Kasus</p>
                        <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->kategori_aduan }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Waktu Kejadian</p>
                        <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->waktu_kejadian }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Tempat Kejadian</p>
                        <p class="text-sm font-bold text-slate-800 mt-1">{{ $laporan->tempat_kejadian }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-wider">Catatan Satgas</p>
                        <p class="text-sm font-medium text-slate-700 mt-1 leading-relaxed bg-white p-3 rounded-lg border border-slate-100">
                            {{ $laporan->catatan_satgas ?: 'Belum ada catatan tambahan dari satgas.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
