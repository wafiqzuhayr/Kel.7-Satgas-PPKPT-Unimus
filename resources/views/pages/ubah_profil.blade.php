@extends('layouts.app')

@section('title', 'Ubah Data Pribadi | Satgas PPKPT UNIMUS')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 mt-8 mb-24">
    
    <div class="mb-10 text-center md:text-left flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-[#0f295a] tracking-tight">Ubah Data Pribadi</h1>
            <p class="text-sm text-slate-500 mt-2 font-medium">Perbarui data identitas Anda untuk keperluan pelaporan.</p>
        </div>
        <a href="{{ route('profile') }}" class="hidden md:inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Kembali ke Profil
        </a>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3">
            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="space-y-6">
        
        <!-- Section: Informasi Pribadi -->
        <div class="bg-white border border-slate-100 rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            <div class="flex items-center gap-4 mb-6 pb-4 border-b border-slate-100">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <div>
                    <h2 class="text-lg font-black text-[#0f295a]">Formulir Data Pribadi</h2>
                    <p class="text-[11px] text-slate-500 font-medium">Pastikan data yang Anda masukkan valid dan sesuai.</p>
                </div>
            </div>
            
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                
                <!-- Avatar Upload Section -->
                <div class="flex items-center gap-6 mb-6">
                    <div class="h-20 w-20 shrink-0 rounded-full bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center shadow-sm">
                        @if(Auth::user()->avatar)
                            <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Foto Profil" class="h-full w-full object-cover">
                        @else
                            <span class="text-2xl font-black text-slate-400">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        @endif
                    </div>
                    <div class="flex-1">
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Foto Profil</label>
                        <input type="file" name="avatar" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all cursor-pointer border border-slate-200 rounded-xl bg-slate-50 p-1">
                        <p class="text-[10px] text-slate-500 mt-1.5">Format JPG, JPEG, PNG. Maksimal ukuran 2 MB.</p>
                        @error('avatar') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        @error('name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Email</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        @error('email') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Nomor Telepon / WA</label>
                        <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="Contoh: 081234567890" class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        @error('phone') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">NIM / NIP</label>
                        <input type="text" name="identity_number" value="{{ old('identity_number', Auth::user()->identity_number) }}" placeholder="Masukkan NIM/NIP jika ada" class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        @error('identity_number') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Fakultas / Unit Kerja</label>
                        <input type="text" name="department" value="{{ old('department', Auth::user()->department) }}" placeholder="Contoh: Fakultas Teknik" class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        @error('department') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex justify-end pt-4 border-t border-slate-100 mt-6">
                    <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-600 hover:from-blue-800 hover:to-indigo-700 px-8 py-3 text-xs font-bold text-white shadow-md transition-all">
                        Simpan Data Pribadi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
