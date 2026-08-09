<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portal Resmi Satgas PPKPT UNIMUS')</title>
    
    <!-- Meta SEO -->
    <meta name="description" content="Portal Resmi Satuan Tugas Pencegahan dan Penanganan Kekerasan Seksual, Perundungan, dan Kekerasan Lainnya (Satgas PPKPT) Universitas Muhammadiyah Semarang. Laporan aduan aman, rahasia, dan terlindungi.">
    <meta name="keywords" content="PPKPT, Satgas PPKPT, UNIMUS, Universitas Muhammadiyah Semarang, Pencegahan Kekerasan Seksual, Perundungan, Kampus Aman">
    
    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-blue-50 via-[#f8fafc] to-[#f8fafc] font-sans antialiased text-slate-800 selection:bg-blue-200 selection:text-blue-900 min-h-screen flex flex-col">

    <!-- Top Navigation Header (Modern Campus Theme: Glassmorphic White) -->
    <header class="fixed top-0 inset-x-0 z-50 bg-white/85 backdrop-blur-md border-b border-slate-200/80 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            
            <!-- Brand Logo Left -->
            <a href="{{ route('beranda') }}" class="flex items-center gap-3.5 group">
                <!-- UNIMUS Logo -->
                <div class="flex h-11 w-11 items-center justify-center transition-transform group-hover:scale-105">
                    <img src="{{ asset('logo.png') }}" alt="Logo UNIMUS" class="h-full w-full object-contain">
                </div>
                <div>
                    <h2 class="text-sm font-black tracking-wider text-[#0f295a] uppercase leading-none">SATGAS PPKPT</h2>
                    <span class="text-[10px] font-bold text-amber-550 tracking-wider text-yellow-600">UNIMUS SEMARANG</span>
                </div>
            </a>

            <!-- Desktop Menu Links -->
            <nav class="hidden lg:flex items-center gap-7">
                <a href="{{ route('beranda') }}" class="relative text-[13px] font-semibold tracking-wide transition-colors duration-300 {{ Route::is('beranda') ? 'text-blue-700' : 'text-slate-600 hover:text-blue-700' }} group">
                    Beranda
                    <span class="absolute -bottom-1.5 left-0 h-[2px] bg-blue-600 transition-all duration-300 {{ Route::is('beranda') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
                <a href="{{ route('berita.index') }}" class="relative text-[13px] font-semibold tracking-wide transition-colors duration-300 {{ Route::is('berita.*') ? 'text-blue-700' : 'text-slate-600 hover:text-blue-700' }} group">
                    Berita
                    <span class="absolute -bottom-1.5 left-0 h-[2px] bg-blue-600 transition-all duration-300 {{ Route::is('berita.*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
                <a href="{{ route('tentang_satgas') }}" class="relative text-[13px] font-semibold tracking-wide transition-colors duration-300 {{ Route::is('tentang_satgas') ? 'text-blue-700' : 'text-slate-600 hover:text-blue-700' }} group">
                    Profil Satgas
                    <span class="absolute -bottom-1.5 left-0 h-[2px] bg-blue-600 transition-all duration-300 {{ Route::is('tentang_satgas') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
                <a href="{{ route('dokumen_resmi') }}" class="relative text-[13px] font-semibold tracking-wide transition-colors duration-300 {{ Route::is(['dokumen_resmi', 'sop_pelaporan']) ? 'text-blue-700' : 'text-slate-600 hover:text-blue-700' }} group">
                    Dokumen Resmi
                    <span class="absolute -bottom-1.5 left-0 h-[2px] bg-blue-600 transition-all duration-300 {{ Route::is(['dokumen_resmi', 'sop_pelaporan']) ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
                <a href="{{ route('layanan_bantuan') }}" class="relative text-[13px] font-semibold tracking-wide transition-colors duration-300 {{ Route::is('layanan_bantuan') ? 'text-blue-700' : 'text-slate-600 hover:text-blue-700' }} group">
                    Layanan Bantuan
                    <span class="absolute -bottom-1.5 left-0 h-[2px] bg-blue-600 transition-all duration-300 {{ Route::is('layanan_bantuan') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
                
                <span class="h-4 w-px bg-slate-200" aria-hidden="true"></span>
                
                <a href="{{ route('lacak_kasus') }}" class="relative text-[13px] font-semibold tracking-wide transition-colors duration-300 {{ Route::is('lacak_kasus') ? 'text-blue-700' : 'text-slate-600 hover:text-blue-700' }} group">
                    Lacak Laporan
                    <span class="absolute -bottom-1.5 left-0 h-[2px] bg-blue-600 transition-all duration-300 {{ Route::is('lacak_kasus') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>
            </nav>

            <!-- Autentikasi / Guest Conditional Controls -->
            <div class="hidden lg:flex items-center gap-6">
                @guest
                    <!-- Register Link -->
                    <a href="{{ route('register') }}" class="text-xs font-bold uppercase tracking-wider text-slate-600 hover:text-blue-700 transition-colors">Register</a>
                    <!-- Log In Button -->
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-600 hover:from-blue-800 hover:to-indigo-700 px-5.5 py-2.5 text-xs font-bold text-white shadow-md hover:shadow-lg hover:-translate-y-0.5 active:scale-95 transition-all">
                        <span>Login</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h3a3 3 0 013 3v1" />
                        </svg>
                    </a>
                @endguest

                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold text-slate-700 hover:text-blue-600 transition-colors bg-blue-50 px-3 py-1.5 rounded-full border border-blue-100 flex items-center gap-1">
                            <svg class="h-3.5 w-3.5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                            Dasbor Admin
                        </a>
                    @else
                        <!-- Dropdown Buat Pengaduan -->
                        <div class="relative">
                            <button type="button" id="pengaduan-dropdown-btn" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-600 hover:from-blue-800 hover:to-indigo-700 px-5.5 py-2.5 text-xs font-bold text-white shadow-md hover:shadow-lg hover:-translate-y-0.5 active:scale-95 transition-all cursor-pointer">
                                <span>Buat Pengaduan</span>
                                <svg id="pengaduan-dropdown-arrow" class="h-3.5 w-3.5 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            
                            <!-- Menu Dropdown -->
                            <div id="pengaduan-dropdown-menu" class="hidden absolute right-0 mt-2 w-64 rounded-2xl bg-white p-2 shadow-2xl border border-slate-100/90 z-50 animate-fade-in-down">
                                <div class="px-3 py-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100 mb-1 flex items-center justify-between">
                                    <span>Pilih Jenis Pengaduan</span>
                                    <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>
                                </div>
                                <a href="{{ route('buat_pengaduan', ['tipe' => 'satgas_ppkpt']) }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl hover:bg-blue-50/80 text-slate-700 hover:text-blue-700 transition-all group">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-700 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                                    </div>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800 group-hover:text-blue-700">Satgas PPKPT</div>
                                        <div class="text-[10px] text-slate-500 font-medium leading-tight">Formulir Kekerasan & Seksual</div>
                                    </div>
                                </a>
                                <a href="{{ route('buat_pengaduan', ['tipe' => 'student_safety']) }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl hover:bg-indigo-50/80 text-slate-700 hover:text-indigo-700 transition-all group mt-1">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-700 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                                    </div>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800 group-hover:text-indigo-700">Student Safety</div>
                                        <div class="text-[10px] text-slate-500 font-medium leading-tight">Formulir Keselamatan Mahasiswa</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Vertical Divider -->
                    <div class="h-6 w-px bg-slate-200" aria-hidden="true"></div>
                    
                    <!-- User Account Group -->
                    <div class="flex items-center gap-3">
                        <div class="flex flex-col items-end text-right">
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Selamat Datang</span>
                            <span class="text-xs font-black text-slate-700 leading-none">{{ Auth::user()->name }}</span>
                        </div>
                        
                        <!-- Profil & Pengaturan Links (Logout Hidden) -->
                        <div class="flex items-center gap-1 bg-slate-100 p-1 rounded-xl border border-slate-200/60 shadow-inner">
                            <a href="{{ route('profile') }}" class="inline-flex items-center justify-center p-2 rounded-lg bg-white shadow-sm border border-slate-200/40 text-blue-600 hover:bg-blue-50 transition-all" title="Profil">
                                @if(Auth::user()->avatar)
                                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Avatar" class="h-4 w-4 rounded-full object-cover">
                                @else
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                @endif
                            </a>
                            <a href="{{ route('settings') }}" class="inline-flex items-center justify-center p-2 rounded-lg text-slate-500 hover:text-slate-800 hover:bg-white hover:shadow-sm transition-all" title="Pengaturan">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </a>
                        </div>
                    </div>
                @endauth
            </div>

            <!-- Hamburger Button for Mobile -->
            <button id="mobile-menu-btn" class="lg:hidden rounded-xl p-2 text-slate-500 hover:bg-slate-100 focus:outline-none" aria-label="Menu Utama">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Drawer Menu (Light/Glassmorphic) -->
        <div id="mobile-drawer" class="hidden lg:hidden border-t border-slate-100 bg-white/95 backdrop-blur-xl px-6 py-6 space-y-4 shadow-xl animate-fade-in-down">
            <nav class="flex flex-col gap-2">
                <a href="{{ route('beranda') }}" class="px-4 py-3 rounded-xl text-[13px] font-semibold tracking-wide transition-all {{ Route::is('beranda') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-700' }}">Beranda</a>
                <a href="{{ route('berita.index') }}" class="px-4 py-3 rounded-xl text-[13px] font-semibold tracking-wide transition-all {{ Route::is('berita.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-700' }}">Berita</a>
                <a href="{{ route('tentang_satgas') }}" class="px-4 py-3 rounded-xl text-[13px] font-semibold tracking-wide transition-all {{ Route::is('tentang_satgas') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-700' }}">Profil Satgas</a>
                <a href="{{ route('dokumen_resmi') }}" class="px-4 py-3 rounded-xl text-[13px] font-semibold tracking-wide transition-all {{ Route::is(['dokumen_resmi', 'sop_pelaporan']) ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-700' }}">Dokumen Resmi</a>
                <a href="{{ route('layanan_bantuan') }}" class="px-4 py-3 rounded-xl text-[13px] font-semibold tracking-wide transition-all {{ Route::is('layanan_bantuan') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-700' }}">Layanan Bantuan</a>
                <a href="{{ route('lacak_kasus') }}" class="px-4 py-3 rounded-xl text-[13px] font-semibold tracking-wide transition-all {{ Route::is('lacak_kasus') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-700' }}">Lacak Laporan</a>
            </nav>
            <div class="pt-4 flex flex-col gap-3">
                @guest
                    <a href="{{ route('register') }}" class="w-full text-center py-2.5 text-xs font-bold text-slate-600 hover:text-blue-700 transition-colors uppercase tracking-wider">Register</a>
                    <a href="{{ route('login') }}" class="w-full justify-center inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-600 px-5 py-3.5 text-xs font-bold text-white shadow-md transition-all uppercase tracking-wider">
                        <span>Login</span>
                    </a>
                @endguest

                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="w-full justify-center inline-flex items-center gap-2 rounded-xl bg-blue-50 border border-blue-100 text-blue-700 hover:bg-blue-100 py-3.5 text-xs font-bold transition-all uppercase tracking-wider">
                            Dasbor Admin
                        </a>
                    @else
                        <div class="space-y-2">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block text-center">Formulir Pengaduan</span>
                            <a href="{{ route('buat_pengaduan', ['tipe' => 'satgas_ppkpt']) }}" class="w-full justify-center inline-flex items-center gap-2 rounded-xl bg-blue-700 hover:bg-blue-800 px-5 py-3 text-xs font-bold text-white shadow-sm transition-all uppercase tracking-wider">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                                <span>Pengaduan Satgas PPKPT</span>
                            </a>
                            <a href="{{ route('buat_pengaduan', ['tipe' => 'student_safety']) }}" class="w-full justify-center inline-flex items-center gap-2 rounded-xl bg-indigo-700 hover:bg-indigo-800 px-5 py-3 text-xs font-bold text-white shadow-sm transition-all uppercase tracking-wider">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                                <span>Pengaduan Student Safety</span>
                            </a>
                        </div>
                    @endif
                    <span class="text-xs font-bold text-slate-700 text-center mb-1">Halo, {{ Auth::user()->name }}</span>
                    
                    <div class="flex gap-2">
                        <a href="{{ route('profile') }}" class="flex-1 justify-center inline-flex items-center gap-2 rounded-xl bg-slate-50 border border-slate-200/60 text-slate-700 hover:bg-slate-100 py-3.5 text-xs font-bold transition-all uppercase tracking-wider">
                            @if(Auth::user()->avatar)
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Avatar" class="h-4 w-4 rounded-full object-cover">
                            @else
                                <svg class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            @endif
                            Profil
                        </a>
                        <a href="{{ route('settings') }}" class="flex-1 justify-center inline-flex items-center gap-2 rounded-xl bg-slate-50 border border-slate-200/60 text-slate-700 hover:bg-slate-100 py-3.5 text-xs font-bold transition-all uppercase tracking-wider">
                            <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            Pengaturan
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="min-h-screen pt-24 pb-20">
        @yield('content')
    </main>

    <!-- Rich Footer (Deep Navy Academic Theme) -->
    <footer class="bg-[#0b1b3d] text-slate-300 pt-16 pb-8 border-t-4 border-yellow-500 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12 relative z-10">
            
            <!-- Col 1: Branding -->
            <div class="space-y-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center">
                        <img src="{{ asset('logo.png') }}" alt="Logo UNIMUS" class="h-full w-full object-contain">
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-white tracking-wider uppercase leading-none">SATGAS PPKPT</h4>
                        <span class="text-[9px] font-bold text-yellow-500 tracking-wider">UNIMUS SEMARANG</span>
                    </div>
                </div>
                <p class="text-xs leading-relaxed text-slate-400">
                    Portal resmi Satuan Tugas PPKPT Universitas Muhammadiyah Semarang. Kami berkomitmen menciptakan ruang belajar akademis yang terlindungi, inklusif, dan bebas kekerasan.
                </p>
            </div>

            <!-- Col 2: Tautan Cepat -->
            <div class="space-y-5">
                <h4 class="text-xs font-bold text-white tracking-wider uppercase border-l-2 border-yellow-500 pl-3">Tautan Informasi</h4>
                <ul class="space-y-3 text-xs text-slate-400">
                    <li><a href="{{ route('beranda') }}" class="hover:text-yellow-400 transition-colors inline-flex items-center gap-1.5"><span class="text-[10px] text-blue-500">▶</span> Beranda & Edukasi</a></li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-yellow-400 transition-colors inline-flex items-center gap-1.5"><span class="text-[10px] text-blue-500">▶</span> Berita & Kegiatan</a></li>
                    <li><a href="{{ route('tentang_satgas') }}" class="hover:text-yellow-400 transition-colors inline-flex items-center gap-1.5"><span class="text-[10px] text-blue-500">▶</span> Profil Satgas (Tim G07)</a></li>
                </ul>
            </div>

            <!-- Col 3: Regulasi & Akses -->
            <div class="space-y-5">
                <h4 class="text-xs font-bold text-white tracking-wider uppercase border-l-2 border-yellow-500 pl-3">Layanan & Hukum</h4>
                <ul class="space-y-3 text-xs text-slate-400">
                    <li><a href="{{ route('dokumen_resmi') }}" class="hover:text-yellow-400 transition-colors inline-flex items-center gap-1.5"><span class="text-[10px] text-blue-500">▶</span> Dokumen & Regulasi PPKPT</a></li>
                    <li><a href="{{ route('layanan_bantuan') }}" class="hover:text-yellow-400 transition-colors inline-flex items-center gap-1.5"><span class="text-[10px] text-blue-500">▶</span> Layanan Bantuan & Hotline</a></li>
                    <li><a href="{{ route('buat_pengaduan') }}" class="hover:text-yellow-400 transition-colors inline-flex items-center gap-1.5"><span class="text-[10px] text-blue-500">▶</span> Buat Pengaduan Baru</a></li>
                    <li><a href="{{ route('lacak_kasus') }}" class="hover:text-yellow-400 transition-colors inline-flex items-center gap-1.5"><span class="text-[10px] text-blue-500">▶</span> Pelacakan Kasus Korban</a></li>
                </ul>
            </div>

            <!-- Col 4: Kontak Sekretariat -->
            <div class="space-y-5">
                <h4 class="text-xs font-bold text-white tracking-wider uppercase border-l-2 border-yellow-500 pl-3">Sekretariat</h4>
                <p class="text-xs leading-relaxed text-slate-400">
                    Gedung Rektorat Lt. 2, Kampus Terpadu UNIMUS, Kedungmundu, Semarang.
                </p>
                <div class="text-xs space-y-2.5 pt-2">
                    <p class="flex items-center gap-2"><svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> <span class="text-slate-300">satgas.ppkpt@unimus.ac.id</span></p>
                    <p class="flex items-center gap-2"><svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> <span class="text-slate-300">+62 812-3456-7890</span></p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 mt-14 pt-6 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-slate-500 relative z-10 font-medium tracking-wide">
            <p>© 2026 Satuan Tugas PPKPT Universitas Muhammadiyah Semarang.</p>
            <p>Desain Kampus Kekinian • Hak Cipta Dilindungi</p>
        </div>
    </footer>

    <!-- Mobile Drawer & Dropdown JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('mobile-menu-btn');
            const drawer = document.getElementById('mobile-drawer');

            if(menuBtn && drawer) {
                menuBtn.addEventListener('click', function() {
                    drawer.classList.toggle('hidden');
                });
            }

            const pengaduanBtn = document.getElementById('pengaduan-dropdown-btn');
            const pengaduanMenu = document.getElementById('pengaduan-dropdown-menu');
            const pengaduanArrow = document.getElementById('pengaduan-dropdown-arrow');

            if (pengaduanBtn && pengaduanMenu) {
                pengaduanBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    pengaduanMenu.classList.toggle('hidden');
                    if (pengaduanArrow) {
                        pengaduanArrow.classList.toggle('rotate-180');
                    }
                });

                document.addEventListener('click', function(e) {
                    if (!pengaduanBtn.contains(e.target) && !pengaduanMenu.contains(e.target)) {
                        pengaduanMenu.classList.add('hidden');
                        if (pengaduanArrow) {
                            pengaduanArrow.classList.remove('rotate-180');
                        }
                    }
                });
            }
        });
    </script>
    <!-- Global Toast Notifications -->
    @include('components.toast-notification')
</body>
</html>
