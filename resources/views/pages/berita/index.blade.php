@extends('layouts.app')

@section('title', 'Berita Kegiatan')

@section('content')
<div class="bg-slate-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-black text-[#0f295a] mb-4">Berita Kegiatan</h1>
            <p class="text-slate-600 font-medium max-w-2xl mx-auto">Kumpulan informasi dan dokumentasi kegiatan terbaru seputar Satgas PPKPT Universitas Muhammadiyah Semarang.</p>
        </div>

        @if($berita->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($berita as $item)
                <a href="{{ route('berita.show', $item->slug) }}" class="group bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full">
                    <div class="aspect-video w-full overflow-hidden bg-slate-100 relative">
                        @if($item->gambar)
                            <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex items-center gap-2 mb-3 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $item->created_at->format('d M Y') }}
                        </div>
                        <h3 class="text-xl font-bold text-[#0f295a] mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">
                            {{ $item->judul }}
                        </h3>
                        <p class="text-slate-600 text-sm line-clamp-3 mb-6 flex-1 font-medium">
                            {{ strip_tags($item->konten) }}
                        </p>
                        <div class="mt-auto">
                            <span class="inline-flex items-center gap-2 text-sm font-bold text-blue-600 group-hover:gap-3 transition-all">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $berita->links() }}
            </div>
        @else
            <div class="text-center py-24 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-slate-50 text-slate-300 mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-[#0f295a] mb-2">Belum Ada Berita</h3>
                <p class="text-slate-500 font-medium">Saat ini belum ada berita kegiatan yang dipublikasikan.</p>
            </div>
        @endif
    </div>
</div>
@endsection
