@extends('layouts.app')

@section('title', 'Profil Pengguna | Satgas PPKPT UNIMUS')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 mt-8 mb-24">
    
    <!-- Header Page -->
    <div class="mb-10 text-center md:text-left">
        <h1 class="text-3xl font-black text-[#0f295a] tracking-tight">Profil Pengguna</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium">Informasi identitas pelapor dan riwayat aktivitas laporan di Satgas PPKPT.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Kolom Kiri: Kartu Identitas Profil -->
        <div class="md:col-span-1 space-y-6">
            <div class="bg-white border border-slate-100 rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] text-center relative overflow-hidden">
                <!-- Aksen Latar -->
                <div class="absolute top-0 inset-x-0 h-32 bg-gradient-to-br from-[#0f295a] to-[#1e40af]"></div>
                
                <div class="relative z-10 flex flex-col items-center mt-8">
                    <!-- Avatar -->
                    <div class="h-28 w-28 rounded-full bg-white p-1.5 shadow-xl mb-5 overflow-hidden flex items-center justify-center">
                        @if(Auth::user()->avatar)
                            <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Foto Profil" class="h-full w-full rounded-full object-cover">
                        @else
                            <div class="h-full w-full rounded-full bg-slate-100 flex items-center justify-center text-4xl font-black text-slate-400">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    
                    <h2 class="text-xl font-bold text-slate-800">{{ Auth::user()->name }}</h2>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 border border-blue-100 px-3 py-1 mt-2 text-[10px] font-black uppercase tracking-widest text-blue-600">
                        Mahasiswa
                    </span>
                </div>
                
                <div class="mt-8 pt-6 border-t border-slate-100 space-y-4">
                    <div class="flex flex-col text-left">
                        <span class="text-[10px] uppercase tracking-widest font-bold text-slate-400">Email</span>
                        <span class="text-sm font-medium text-slate-700">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-[10px] uppercase tracking-widest font-bold text-slate-400">Status Akun</span>
                        <div class="flex items-center gap-1.5 mt-1">
                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                            <span class="text-xs font-bold text-emerald-600">Terverifikasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Kolom Kanan: Detail & Aktivitas -->
        <div class="md:col-span-2 space-y-6">
            
            <div class="bg-white border border-slate-100 rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                    <h3 class="text-lg font-black text-[#0f295a]">Data Pribadi Tersimpan</h3>
                    <a href="{{ route('profile.edit') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800">Ubah Data</a>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <p class="text-[10px] uppercase tracking-widest font-bold text-slate-400">Nama Lengkap</p>
                        <p class="text-sm font-medium text-slate-800">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-[10px] uppercase tracking-widest font-bold text-slate-400">Nomor Telepon / WA</p>
                        <p class="text-sm font-medium text-slate-800">{{ Auth::user()->phone ?: '-' }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-[10px] uppercase tracking-widest font-bold text-slate-400">NIM / NIP</p>
                        <p class="text-sm font-medium text-slate-800">{{ Auth::user()->identity_number ?: '-' }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-[10px] uppercase tracking-widest font-bold text-slate-400">Fakultas / Unit</p>
                        <p class="text-sm font-medium text-slate-800">{{ Auth::user()->department ?: '-' }}</p>
                    </div>
                </div>
                
                <div class="mt-8 bg-amber-50 border border-amber-100 rounded-xl p-4 flex gap-4">
                    <svg class="h-6 w-6 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <div>
                        <h4 class="text-xs font-bold text-amber-800">Lengkapi Profil Anda</h4>
                        <p class="text-[11px] text-amber-700 mt-1 leading-relaxed">Untuk mempercepat proses pelaporan, disarankan untuk melengkapi data NIM dan Fakultas/Unit kerja Anda.</p>
                    </div>
                </div>
            </div>

            <!-- Aktivitas Laporan -->
            <div class="bg-white border border-slate-100 rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                    <h3 class="text-lg font-black text-[#0f295a]">Riwayat Laporan Anda</h3>
                    <a href="{{ route('lacak_kasus') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800">Lacak Kasus</a>
                </div>
                
                @if($laporans->isEmpty())
                    <div class="text-center py-10">
                        <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-50 text-slate-300 mb-4">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        </div>
                        <p class="text-sm font-medium text-slate-500">Anda belum pernah membuat laporan aduan apapun.</p>
                        <a href="{{ route('buat_pengaduan') }}" class="inline-block mt-4 text-xs font-bold text-blue-600 hover:text-blue-800 underline underline-offset-4">
                            Buat Pengaduan Baru
                        </a>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($laporans as $laporan)
                            <div class="border border-slate-100 rounded-xl p-4 hover:border-blue-100 hover:bg-blue-50/50 transition-colors flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="text-xs font-black text-[#0f295a]">{{ $laporan->id }}</span>
                                        <span class="text-[10px] text-slate-400 font-medium">&bull; {{ $laporan->created_at->format('d M Y') }}</span>
                                    </div>
                                    <p class="text-sm font-bold text-slate-800 truncate max-w-[250px] sm:max-w-sm">{{ $laporan->kategori_aduan }}</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    @php
                                        $statusColors = [
                                            'Menunggu' => 'bg-amber-100 text-amber-700 border-amber-200',
                                            'Diproses' => 'bg-blue-100 text-blue-700 border-blue-200',
                                            'Selesai'  => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                            'Ditolak'  => 'bg-red-100 text-red-700 border-red-200',
                                        ];
                                        $color = $statusColors[$laporan->status] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                                    @endphp
                                    <span class="inline-flex px-2.5 py-1 rounded-md border text-[10px] font-bold uppercase tracking-wider {{ $color }}">
                                        {{ $laporan->status }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6 text-center">
                        <a href="{{ route('lacak_kasus') }}" class="inline-block text-xs font-bold text-slate-500 hover:text-blue-600 transition-colors">Lihat Semua di Halaman Lacak Kasus &rarr;</a>
                    </div>
                @endif
            </div>
            
        </div>
    </div>
</div>
@endsection
