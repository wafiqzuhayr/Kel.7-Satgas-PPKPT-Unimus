@extends('layouts.app')

@section('title', $berita->judul . ' - Berita Kegiatan')

@section('content')
<div class="bg-slate-50 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-blue-600 transition-colors mb-8">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Daftar Berita
        </a>

        <article class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100">
            @if($berita->gambar)
                <div class="w-full h-[400px] overflow-hidden bg-slate-100">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div class="p-8 md:p-12">
                <div class="flex items-center gap-2 mb-6 text-sm font-bold text-blue-600 uppercase tracking-wider">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $berita->created_at->format('d F Y') }}
                </div>

                <h1 class="text-3xl md:text-4xl font-black text-[#0f295a] mb-8 leading-tight">
                    {{ $berita->judul }}
                </h1>

                <div class="prose prose-lg prose-slate max-w-none prose-headings:font-bold prose-headings:text-[#0f295a] prose-a:text-blue-600 hover:prose-a:text-blue-800 prose-img:rounded-2xl">
                    {!! nl2br(e($berita->konten)) !!}
                </div>
            </div>
        </article>
    </div>
</div>
@endsection
