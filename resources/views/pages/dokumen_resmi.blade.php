@extends('layouts.app')

@section('title', 'Dokumen Resmi | Satgas PPKPT UNIMUS')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 mt-8 mb-16">
    <div class="text-center mb-12">
        <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-50 px-3 py-1 text-xs font-bold text-blue-600 mb-3">
            Pusat Unduhan
        </span>
        <h1 class="text-3xl md:text-4xl font-black text-[#0f295a] tracking-tight">Dokumen Regulasi PPKPT</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium max-w-2xl mx-auto">Kumpulan Peraturan Rektor, SK Kepengurusan, serta dokumen resmi terbaru Satgas PPKPT Universitas Muhammadiyah Semarang.</p>
    </div>

    <!-- Latest Update Banner -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 mb-8">
        <div class="rounded-3xl border border-blue-100 bg-blue-50 p-6 text-sm text-slate-700">
            <strong class="font-semibold text-blue-700">Dokumen terbaru:</strong>
            SK Pencegahan Dan Penanganan Kekerasan Di Lingkungan Unimus telah ditambahkan dan diperbarui pada 30 Juni 2026.
        </div>
    </div>

    <!-- Docs List -->
    <div class="bg-white border border-slate-100 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        <ul class="divide-y divide-slate-100">
            <!-- Doc 1 -->
            <li class="p-6 hover:bg-slate-50/50 transition-colors flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between group">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-800">SK Pencegahan Dan Penanganan Kekerasan Di Lingkungan Unimus</h3>
                        <p class="text-[11px] text-slate-500 font-medium mt-0.5">PDF • Dokumen terbaru • Diperbarui 30 Juni 2026</p>
                    </div>
                </div>
                <a href="{{ asset('dokumen/SK Pencegahan Dan Penanganan Kekerasan Di Lingkungan Unimus.pdf') }}" target="_blank" class="shrink-0 inline-flex items-center gap-2 rounded-lg bg-white border border-slate-200 px-4 py-2 text-[11px] font-bold text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                    Unduh
                </a>
            </li>

            <!-- Doc 2 -->
            <li class="p-6 hover:bg-slate-50/50 transition-colors flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between group">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-100 group-hover:bg-red-600 group-hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-800">PROSEDUR OPERASIONAL BAKU PPKPTdocx</h3>
                        <p class="text-[11px] text-slate-500 font-medium mt-0.5">PDF • Dokumen resmi • Diperbarui 30 Juni 2026</p>
                    </div>
                </div>
                <a href="{{ asset('dokumen/PROSEDUR OPERASIONAL BAKU PPKPTdocx.pdf') }}" target="_blank" class="shrink-0 inline-flex items-center gap-2 rounded-lg bg-white border border-slate-200 px-4 py-2 text-[11px] font-bold text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                    Unduh
                </a>
            </li>

            <!-- Doc 3 -->
            <li class="p-6 hover:bg-slate-50/50 transition-colors flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between group">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-xl bg-orange-50 text-orange-700 flex items-center justify-center shrink-0 border border-orange-100 group-hover:bg-orange-700 group-hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-800">2025-26.467.KP Satuan Tugas Pencegahan dan Penanganan Kekerasan Dilingkungan Perguruan Tinggi (PPKPT)</h3>
                        <p class="text-[11px] text-slate-500 font-medium mt-0.5">PDF • Dokumen aturan • Diperbarui Terbaru</p>
                    </div>
                </div>
                <a href="{{ asset('dokumen/2025-26.467.KP Satuan Tugas Pencegahan dan Penanganan Kekerasan Dilingkungan Perguruan Tinggi (PPKPT).pdf') }}" target="_blank" class="shrink-0 inline-flex items-center gap-2 rounded-lg bg-white border border-slate-200 px-4 py-2 text-[11px] font-bold text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                    Unduh
                </a>
            </li>

            <!-- Doc 4 -->
            <li class="p-6 hover:bg-slate-50/50 transition-colors flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between group">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 border border-emerald-100 group-hover:bg-emerald-700 group-hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16.5V7.5A2.5 2.5 0 016.5 5h11A2.5 2.5 0 0120 7.5v9a2.5 2.5 0 01-2.5 2.5h-11A2.5 2.5 0 014 16.5zM8 12l2.5 3 2.5-3 3.5 4.5H6.5L8 12z" /></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-800">Alur Pengaduan PPKPT</h3>
                        <p class="text-[11px] text-slate-500 font-medium mt-0.5">JPEG • Diagram alur pengaduan • Diperbarui 30 Juni 2026</p>
                    </div>
                </div>
                <a href="{{ asset('dokumen/Alur Pengaduan PPKPT.jpeg') }}" target="_blank" class="shrink-0 inline-flex items-center gap-2 rounded-lg bg-white border border-slate-200 px-4 py-2 text-[11px] font-bold text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    Lihat
                </a>
            </li>

            <!-- Doc 5 -->
            <li class="p-6 hover:bg-slate-50/50 transition-colors flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between group">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 border border-emerald-100 group-hover:bg-emerald-700 group-hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16.5V7.5A2.5 2.5 0 016.5 5h11A2.5 2.5 0 0120 7.5v9a2.5 2.5 0 01-2.5 2.5h-11A2.5 2.5 0 014 16.5zM8 12l2.5 3 2.5-3 3.5 4.5H6.5L8 12z" /></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-800">Informasi Kontak PPKPT</h3>
                        <p class="text-[11px] text-slate-500 font-medium mt-0.5">JPEG • Kontak penting Satgas PPKPT • Diperbarui 30 Juni 2026</p>
                    </div>
                </div>
                <a href="{{ asset('dokumen/Informasi Kontak PPKPT.jpeg') }}" target="_blank" class="shrink-0 inline-flex items-center gap-2 rounded-lg bg-white border border-slate-200 px-4 py-2 text-[11px] font-bold text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    Lihat
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection
