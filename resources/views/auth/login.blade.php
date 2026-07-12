@extends('layouts.app')

@section('title', 'Masuk Akun | Satgas PPKPT UNIMUS')

@section('content')
<div class="flex justify-center items-center py-10 px-4">
    <!-- Login Card (Modern Campus Theme: Clean White & Navy) -->
    <div class="bg-white border border-slate-100 rounded-3xl p-8 md:p-10 w-full max-w-md shadow-[0_8px_30px_rgb(0,0,0,0.08)] relative overflow-hidden">
        <!-- Brand Logo Header -->
        <div class="flex flex-col items-center gap-3 mb-8">
            <div class="flex h-16 w-16 items-center justify-center overflow-hidden">
                <img src="{{ asset('logo.png') }}" alt="Logo UNIMUS" class="h-full w-full object-contain">
            </div>
            <div class="text-center">
                <h2 class="text-lg font-black tracking-wider uppercase leading-none text-[#0f295a]">LOGIN PORTAL</h2>
                <span class="text-[10px] font-bold text-slate-500 tracking-wider uppercase">SATGAS PPKPT UNIMUS</span>
            </div>
        </div>

        <!-- Error Banner -->
        @if ($errors->any())
            <div class="bg-red-50 border border-red-100 text-red-600 text-xs px-4 py-3.5 rounded-xl font-medium space-y-1 mb-6 shadow-sm">
                @foreach ($errors->all() as $error)
                    <p class="flex items-center gap-1.5"><svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label for="email" class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-2">Alamat Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="nama@unimus.ac.id" class="w-full bg-slate-50/50 border border-slate-200 text-slate-800 rounded-xl pl-11 pr-4 py-3.5 text-xs focus:outline-none focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 transition-all font-medium">
                </div>
            </div>

            <div>
                <div class="flex justify-between items-center mb-2">
                    <label for="password" class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider">Password</label>
                    <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-blue-600 hover:text-blue-800 transition-colors">Lupa Password?</a>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <input type="password" name="password" id="password" required placeholder="Masukkan password Anda" class="w-full bg-slate-50/50 border border-slate-200 text-slate-800 rounded-xl pl-11 pr-4 py-3.5 text-xs focus:outline-none focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 transition-all font-medium">
                </div>
            </div>

            <!-- Remember me -->
            <div class="flex items-center mt-1">
                <input type="checkbox" name="remember" id="remember" class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-600 cursor-pointer">
                <label for="remember" class="ml-2.5 block text-xs font-medium text-slate-600 cursor-pointer">Ingat saya di perangkat ini</label>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full flex justify-center items-center gap-2 rounded-xl bg-[#0f295a] hover:bg-blue-900 px-4 py-3.5 text-xs font-black text-white shadow-xl shadow-blue-900/20 hover:shadow-2xl hover:-translate-y-0.5 active:scale-95 transition-all">
                    Login Akun
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </form>

        <!-- Register Tautan -->
        <div class="text-center pt-6 mt-6 border-t border-slate-100">
            <p class="text-center text-xs font-medium text-slate-500 mt-6">
                Belum punya akun? <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-800 transition-colors">Register di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection
