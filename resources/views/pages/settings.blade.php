@extends('layouts.app')

@section('title', 'Pengaturan Akun | Satgas PPKPT UNIMUS')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 mt-8 mb-24">
    
    <div class="mb-10 text-center md:text-left flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h1 class="text-3xl font-black text-[#0f295a] tracking-tight">Pengaturan Akun</h1>
            <p class="text-sm text-slate-500 mt-2 font-medium">Kelola preferensi privasi, keamanan, dan notifikasi akun Anda.</p>
        </div>
        <a href="{{ route('profile') }}" class="inline-flex self-start md:self-auto items-center gap-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Kembali ke Profil
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-100 p-4 rounded-2xl mb-6 shadow-sm text-center">
            <p class="text-sm font-bold text-emerald-700">{{ session('success') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('settings.update') }}" class="space-y-6">
        @csrf

        <!-- Section: Notifikasi -->
        <div class="bg-white border border-slate-100 rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            <div class="flex items-center gap-4 mb-6 pb-4 border-b border-slate-100">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                </div>
                <div>
                    <h2 class="text-lg font-black text-[#0f295a]">Preferensi Notifikasi</h2>
                    <p class="text-[11px] text-slate-500 font-medium">Atur bagaimana kami menghubungi Anda.</p>
                </div>
            </div>
            
            <div class="space-y-6">
                <!-- Toggle Item -->
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-slate-800">Notifikasi Email</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Terima pembaruan status laporan via email.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="notif_email" value="1" class="sr-only peer" {{ Auth::user()->notif_email ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                
                <!-- Toggle Item -->
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-slate-800">Notifikasi WhatsApp</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Peringatan darurat langsung ke WA Anda.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="notif_wa" value="1" class="sr-only peer" {{ Auth::user()->notif_wa ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>
        
        <!-- Section: Privasi & Keamanan -->
        <div class="bg-white border border-slate-100 rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            <div class="flex items-center gap-4 mb-6 pb-4 border-b border-slate-100">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                </div>
                <div>
                    <h2 class="text-lg font-black text-[#0f295a]">Keamanan Akun</h2>
                    <p class="text-[11px] text-slate-500 font-medium">Lindungi data Anda dengan pengaturan keamanan ekstra.</p>
                </div>
            </div>
            
            <div class="space-y-6">
                <!-- Action Item -->
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-slate-800">Ubah Kata Sandi</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Perbarui kata sandi Anda secara berkala.</p>
                    </div>
                    <a href="{{ route('password.edit') }}" class="px-4 py-2 text-[11px] font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors">
                        Perbarui
                    </a>
                </div>
                
                <!-- Toggle Item -->
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-slate-800">Anonimitas Profil</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Sembunyikan identitas Anda secara default dari laporan.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-end pt-4">
            <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-600 hover:from-blue-800 hover:to-indigo-700 px-8 py-3.5 text-xs font-bold text-white shadow-md hover:shadow-lg transition-all">
                Simpan Perubahan
            </button>
        </div>
    </form>

        <!-- Section: Keluar / Logout -->
        <div class="bg-red-50/50 border border-red-100 rounded-[2rem] p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] mt-12">
            <div class="flex items-center gap-4 mb-6 pb-4 border-b border-red-100/60">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-100 text-red-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                </div>
                <div>
                    <h2 class="text-lg font-black text-red-700">Keluar Sesi</h2>
                    <p class="text-[11px] text-red-500 font-medium">Akhiri sesi Anda di perangkat ini dengan aman.</p>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-bold text-slate-800">Log Keluar (Logout)</p>
                    <p class="text-[11px] text-slate-500 mt-0.5">Anda harus masuk kembali jika ingin melacak laporan Anda.</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-6 py-2.5 text-xs font-bold text-white bg-red-600 hover:bg-red-700 rounded-xl transition-colors shadow-sm">
                        Keluar Akun
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection
