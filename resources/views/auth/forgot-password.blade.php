@extends('layouts.app')

@section('title', 'Lupa Kata Sandi | Satgas PPKPT UNIMUS')

@section('content')
<div class="flex justify-center items-center py-10 px-4">
    <div class="bg-white border border-slate-100 rounded-3xl p-8 md:p-10 w-full max-w-md shadow-[0_8px_30px_rgb(0,0,0,0.08)] relative overflow-hidden">
        
        <div class="text-center mb-8">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 mb-4">
                <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
            </div>
            <h2 class="text-2xl font-black tracking-tight text-[#0f295a]">Lupa Password?</h2>
            <p class="text-xs font-medium text-slate-500 mt-2">Masukkan email terdaftar Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi.</p>
        </div>

        @if (session('success'))
            <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 text-xs px-4 py-3.5 rounded-xl font-medium space-y-1 mb-6 shadow-sm">
                <p class="flex items-start gap-1.5"><svg class="h-4 w-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-50 border border-red-100 text-red-600 text-xs px-4 py-3.5 rounded-xl font-medium space-y-1 mb-6 shadow-sm">
                @foreach ($errors->all() as $error)
                    <p class="flex items-center gap-1.5"><svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="space-y-5">
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

            <div class="pt-2">
                <button type="submit" class="w-full flex justify-center items-center gap-2 rounded-xl bg-[#0f295a] hover:bg-blue-900 px-4 py-3.5 text-xs font-black text-white shadow-xl shadow-blue-900/20 hover:shadow-2xl hover:-translate-y-0.5 active:scale-95 transition-all">
                    Kirim Tautan Pemulihan
                </button>
            </div>
        </form>

        <div class="text-center pt-6 mt-6 border-t border-slate-100">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-[#0f295a] transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Login
            </a>
        </div>
    </div>
</div>
@endsection
