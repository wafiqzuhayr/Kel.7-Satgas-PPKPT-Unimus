@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita Kegiatan')

@section('content')
<div class="bg-white border border-slate-100 rounded-3xl shadow-sm overflow-hidden p-6 md:p-8 max-w-4xl">
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="judul" class="block text-sm font-bold text-[#0f295a] mb-2">Judul Berita</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required class="w-full bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block p-3 font-medium transition-colors">
            @error('judul')
                <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="gambar" class="block text-sm font-bold text-[#0f295a] mb-2">Gambar Cover (Opsional)</label>
            @if($berita->gambar)
                <div class="mb-3">
                    <p class="text-xs text-slate-500 mb-1 font-bold">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Cover" class="w-32 h-32 object-cover rounded-xl shadow-sm">
                </div>
            @endif
            <input class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors" id="gambar" type="file" name="gambar" accept="image/*">
            <p class="mt-1 text-xs text-slate-500 font-medium">Biarkan kosong jika tidak ingin mengubah gambar.</p>
            @error('gambar')
                <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="konten" class="block text-sm font-bold text-[#0f295a] mb-2">Isi Berita</label>
            <textarea id="konten" name="konten" rows="10" required class="w-full bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block p-3 font-medium transition-colors">{{ old('konten', $berita->konten) }}</textarea>
            @error('konten')
                <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-8 flex items-center">
            <input id="is_published" name="is_published" type="checkbox" value="1" {{ $berita->is_published ? 'checked' : '' }} class="w-5 h-5 text-blue-600 bg-slate-50 border-slate-300 rounded focus:ring-blue-500">
            <label for="is_published" class="ml-2 text-sm font-bold text-slate-700">Publikasikan</label>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow-sm transition-colors">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.berita.index') }}" class="text-slate-500 hover:text-slate-700 font-bold transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection
