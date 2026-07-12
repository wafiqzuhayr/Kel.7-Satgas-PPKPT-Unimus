@extends('layouts.app')

@section('title', 'Ubah Kata Sandi | Satgas PPKPT UNIMUS')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 mt-8 mb-24">
    
    <div class="mb-10 text-center md:text-left flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-[#0f295a] tracking-tight">Keamanan Akun</h1>
            <p class="text-sm text-slate-500 mt-2 font-medium">Perbarui kata sandi Anda secara berkala untuk menjaga keamanan akun.</p>
        </div>
        <a href="{{ route('settings') }}" class="hidden md:inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Kembali ke Pengaturan
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-2 shadow-sm">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span class="text-xs font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white border border-slate-100 rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
        <div class="flex items-center gap-4 mb-8 pb-4 border-b border-slate-100">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
            </div>
            <div>
                <h2 class="text-lg font-black text-[#0f295a]">Ubah Kata Sandi</h2>
                <p class="text-[11px] text-slate-500 font-medium">Gunakan kombinasi huruf, angka, dan simbol unik.</p>
            </div>
        </div>

        <form action="{{ route('password.update') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-2">Kata Sandi Saat Ini</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                    <input type="password" name="current_password" required class="w-full bg-slate-50/50 border border-slate-200 text-slate-800 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 transition-all font-medium">
                </div>
                @error('current_password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-2">Kata Sandi Baru</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" /></svg>
                    </div>
                    <input type="password" name="password" required class="w-full bg-slate-50/50 border border-slate-200 text-slate-800 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 transition-all font-medium">
                </div>
                @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-2">Konfirmasi Kata Sandi Baru</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" /></svg>
                    </div>
                    <input type="password" name="password_confirmation" required class="w-full bg-slate-50/50 border border-slate-200 text-slate-800 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 transition-all font-medium">
                </div>
            </div>

            <div class="flex justify-end pt-4 mt-8 border-t border-slate-100">
                <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-[#0f295a] hover:bg-blue-900 px-6 py-3 text-xs font-black text-white shadow-xl shadow-blue-900/20 hover:shadow-2xl hover:-translate-y-0.5 active:scale-95 transition-all">
                    Perbarui Kata Sandi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
