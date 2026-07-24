<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Satgas PPKPT UNIMUS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex h-screen overflow-hidden text-slate-800 bg-[#f8fafc] font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-[#0f295a] to-[#0a1c3d] text-white flex flex-col transition-all duration-300 z-20 shadow-2xl shrink-0 relative overflow-hidden">
        <!-- Subtle background decoration for sidebar -->
        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-48 h-48 rounded-full bg-blue-500/10 blur-3xl pointer-events-none"></div>
        <div class="h-16 flex items-center justify-center border-b border-white/10 gap-3 px-4">
            <div class="flex h-8 w-8 items-center justify-center bg-white rounded-lg p-1">
                <img src="{{ asset('logo.png') }}" alt="UNIMUS" class="h-full w-full object-contain">
            </div>
            <span class="font-black tracking-wider text-sm">SATGAS PPKPT</span>
        </div>

        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            <p class="px-3 text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-2">Menu Utama</p>
            
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-yellow-400 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white font-medium' }}">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                <span class="text-sm">Dasbor</span>
            </a>

            <!-- Sidebar Dropdown Group: Data Laporan -->
            <div class="space-y-1">
                <button type="button" id="sidebar-laporan-btn" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl transition-colors cursor-pointer {{ request()->routeIs('admin.laporan.*') ? 'bg-white/10 text-yellow-400 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white font-medium' }}">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        <span class="text-sm">Data Laporan</span>
                    </div>
                    <svg id="sidebar-laporan-arrow" class="h-4 w-4 transition-transform duration-200 {{ request()->routeIs('admin.laporan.*') ? 'rotate-180' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                
                <div id="sidebar-laporan-menu" class="pl-8 pr-1 space-y-1 {{ request()->routeIs('admin.laporan.*') ? '' : 'hidden' }}">
                    <a href="{{ route('admin.laporan.index', ['tipe' => 'satgas_ppkpt']) }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs transition-colors {{ request()->query('tipe') == 'satgas_ppkpt' ? 'bg-yellow-400/20 text-yellow-300 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white font-medium' }}">
                        <span>🛡️ Satgas PPKPT</span>
                    </a>
                    <a href="{{ route('admin.laporan.index', ['tipe' => 'student_safety']) }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs transition-colors {{ request()->query('tipe') == 'student_safety' ? 'bg-indigo-400/20 text-indigo-300 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white font-medium' }}">
                        <span>🦺 Student Safety</span>
                    </a>
                    <a href="{{ route('admin.laporan.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs transition-colors {{ !request()->has('tipe') && request()->routeIs('admin.laporan.index') ? 'bg-white/10 text-white font-bold' : 'text-slate-400 hover:text-white hover:bg-white/5 font-medium' }}">
                        <span>📋 Semua Laporan</span>
                    </a>
                </div>
            </div>

            <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.berita.*') ? 'bg-white/10 text-yellow-400 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white font-medium' }}">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                <span class="text-sm">Berita Kegiatan</span>
            </a>
        </nav>

        <div class="p-4 border-t border-white/10">
            <div class="flex items-center gap-3 mb-4 px-2">
                <div class="h-8 w-8 rounded-full bg-gradient-to-br from-yellow-400 to-amber-600 flex items-center justify-center text-[#0f295a] font-bold text-sm">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-slate-400 truncate">Administrator</p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl bg-white/5 text-slate-300 hover:bg-red-500/20 hover:text-red-400 transition-colors text-xs font-bold">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden bg-slate-50 relative">
        <!-- Topbar -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6 shrink-0 shadow-sm z-10">
            <h1 class="text-lg font-black text-[#0f295a] tracking-tight">@yield('page_title', 'Dashboard')</h1>
            
            <div class="flex items-center gap-4">
                <a href="{{ route('beranda') }}" target="_blank" class="text-xs font-bold text-slate-500 hover:text-blue-600 transition-colors flex items-center gap-1.5 bg-slate-100 px-3 py-1.5 rounded-full">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    Lihat Portal Publik
                </a>
            </div>
        </header>

        <!-- Content Area -->
        <div class="flex-1 overflow-auto p-6 md:p-8">
            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 p-4 rounded-2xl mb-6 shadow-sm flex items-center gap-3">
                    <svg class="h-5 w-5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span class="text-sm font-bold">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border border-red-100 text-red-700 p-4 rounded-2xl mb-6 shadow-sm flex items-center gap-3">
                    <svg class="h-5 w-5 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span class="text-sm font-bold">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('sidebar-laporan-btn');
            const menu = document.getElementById('sidebar-laporan-menu');
            const arrow = document.getElementById('sidebar-laporan-arrow');

            if (btn && menu) {
                btn.addEventListener('click', function(e) {
                    menu.classList.toggle('hidden');
                    if (arrow) arrow.classList.toggle('rotate-180');
                });
            }
        });
    </script>
</body>
</html>
