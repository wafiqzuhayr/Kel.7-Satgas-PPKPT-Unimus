@extends('layouts.app')

@section('title', 'Tentang Satgas | Satgas PPKPT UNIMUS')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 mt-8 mb-16">
    <div class="text-center mb-12">
        <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-50 px-3 py-1 text-xs font-bold text-blue-600 mb-3">
            Mengenal Lebih Dekat
        </span>
        <h1 class="text-3xl md:text-4xl font-black text-[#0f295a] tracking-tight">Profil Satgas PPKPT</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium max-w-2xl mx-auto">Kami berdedikasi menciptakan ruang aman bagi seluruh civitas akademika Universitas Muhammadiyah Semarang tanpa terkecuali.</p>
    </div>

    <!-- Visi Misi Card -->
    <div class="bg-white border border-slate-100 rounded-3xl p-8 md:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] mb-10 relative overflow-hidden">
        <div class="absolute right-0 top-0 w-32 h-32 bg-blue-50 rounded-bl-full opacity-50"></div>
        <div class="relative z-10 space-y-6">
            <div>
                <h2 class="text-xl font-black text-slate-800 mb-3 flex items-center gap-2">
                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    Visi
                </h2>
                <p class="text-sm text-slate-600 leading-relaxed font-medium">Mewujudkan lingkungan kampus Universitas Muhammadiyah Semarang yang aman, sehat, beretika, dan sepenuhnya bebas dari segala bentuk kekerasan seksual maupun perundungan.</p>
            </div>
            <div class="h-px bg-slate-100 w-full"></div>
            <div>
                <h2 class="text-xl font-black text-slate-800 mb-3 flex items-center gap-2">
                    <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    Misi
                </h2>
                <ul class="space-y-2 text-sm text-slate-600 font-medium">
                    <li class="flex items-start gap-2"><span class="text-indigo-500 mt-0.5">▪</span> Menyelenggarakan program edukasi pencegahan secara berkala bagi mahasiswa, dosen, dan tendik.</li>
                    <li class="flex items-start gap-2"><span class="text-indigo-500 mt-0.5">▪</span> Menyediakan layanan pengaduan yang mudah diakses, rahasia, dan responsif.</li>
                    <li class="flex items-start gap-2"><span class="text-indigo-500 mt-0.5">▪</span> Melakukan pendampingan psikologis dan hukum bagi korban.</li>
                    <li class="flex items-start gap-2"><span class="text-indigo-500 mt-0.5">▪</span> Memastikan penegakan sanksi tegas sesuai kode etik universitas.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Tim Satgas (Kelompok 7) -->
    <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-black text-[#0f295a]">Struktur Tim Satgas G07</h2>
            <p class="text-xs text-slate-500 mt-2 font-medium">Pengurus Inti Periode 2026</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Anggota 1 -->
            <div class="text-center group">
                <div class="mx-auto h-24 w-24 rounded-2xl bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center mb-4 transition-transform group-hover:-translate-y-2 group-hover:shadow-lg border border-slate-100">
                    <svg class="h-10 w-10 text-blue-600 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <h3 class="text-sm font-bold text-slate-800">Wafiq Zuhayr</h3>
                <p class="text-[11px] text-slate-500 font-medium">Ketua Satgas (G07)</p>
            </div>
            
            <!-- Anggota 2 -->
            <div class="text-center group">
                <div class="mx-auto h-24 w-24 rounded-2xl bg-gradient-to-br from-teal-100 to-emerald-100 flex items-center justify-center mb-4 transition-transform group-hover:-translate-y-2 group-hover:shadow-lg border border-slate-100">
                    <svg class="h-10 w-10 text-teal-600 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <h3 class="text-sm font-bold text-slate-800">Cintiya H</h3>
                <p class="text-[11px] text-slate-500 font-medium">Psikolog Klinis Utama</p>
            </div>

            <!-- Anggota 3 -->
            <div class="text-center group">
                <div class="mx-auto h-24 w-24 rounded-2xl bg-gradient-to-br from-purple-100 to-fuchsia-100 flex items-center justify-center mb-4 transition-transform group-hover:-translate-y-2 group-hover:shadow-lg border border-slate-100">
                    <svg class="h-10 w-10 text-purple-600 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <h3 class="text-sm font-bold text-slate-800">Dhea K</h3>
                <p class="text-[11px] text-slate-500 font-medium">Advokasi & Hukum</p>
            </div>

            <!-- Anggota 4 -->
            <div class="text-center group">
                <div class="mx-auto h-24 w-24 rounded-2xl bg-gradient-to-br from-orange-100 to-amber-100 flex items-center justify-center mb-4 transition-transform group-hover:-translate-y-2 group-hover:shadow-lg border border-slate-100">
                    <svg class="h-10 w-10 text-orange-600 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <h3 class="text-sm font-bold text-slate-800">Khaerul M</h3>
                <p class="text-[11px] text-slate-500 font-medium">Investigasi Lapangan</p>
            </div>
        </div>
    </div>
</div>
@endsection
