@extends('layouts.app')

@section('title', 'Beranda & Edukasi | Satgas PPKPT UNIMUS')

@section('content')
<!-- Hero Section (Proportionate Full-Width) -->
<div class="relative h-[550px] md:h-[650px] w-full flex items-center justify-center overflow-hidden bg-[#0a192f] text-white">
    
    <!-- Background Slides Wrapper -->
    <div id="carousel-slides" class="absolute inset-0 flex h-full w-full transition-transform duration-[1500ms] ease-[cubic-bezier(0.25,1,0.5,1)] z-0">
        <!-- Slide 1 -->
        <div class="min-w-full h-full relative shrink-0">
            <img src="/campus1.jpg" alt="Rektorat UNIMUS" class="h-full w-full object-cover scale-105 motion-safe:animate-[pulse_15s_ease-in-out_infinite_alternate]">
        </div>
        <!-- Slide 2 -->
        <div class="min-w-full h-full relative shrink-0">
            <img src="/campus2.jpg" alt="Kampus UNIMUS" class="h-full w-full object-cover scale-105 motion-safe:animate-[pulse_15s_ease-in-out_infinite_alternate]">
        </div>
    </div>

    <!-- Cinematic Overlays -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#0a192f]/70 via-[#0a192f]/40 to-[#0a192f]/90 z-10 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-blue-900/30 via-transparent to-transparent z-10"></div>
    
    <!-- Content Overlaid -->
    <div class="relative z-20 w-full max-w-7xl mx-auto px-6 md:px-12 flex flex-col justify-center h-full">
        <div class="max-w-3xl space-y-6">
            <!-- Badge -->
            <div class="inline-flex items-center gap-3 rounded-full border border-yellow-400/30 bg-white/5 px-4 py-2 backdrop-blur-md shadow-2xl">
                <span class="flex h-2.5 w-2.5 rounded-full bg-yellow-400 animate-pulse shadow-[0_0_10px_rgba(250,204,21,1)]"></span>
                <span class="text-xs font-bold tracking-widest text-yellow-300 uppercase">UNIMUS Kampus Terlindungi</span>
            </div>

            <!-- Heading -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tight leading-[1.15] text-white drop-shadow-lg">
                Mewujudkan Lingkungan<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-400 to-amber-500">Kampus Sehat & Bermartabat</span>
            </h1>

            <!-- Subtext -->
            <p class="text-base md:text-lg text-slate-200 leading-relaxed font-medium max-w-2xl border-l-2 border-yellow-400/50 pl-4">
                Portal resmi Satuan Tugas PPKPT Universitas Muhammadiyah Semarang. Kami mendampingi pemulihan hak akademis Anda secara profesional, rahasia, dan aman.
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                @guest
                    <a href="{{ route('login') }}" class="group relative inline-flex items-center justify-center gap-3 overflow-hidden rounded-full bg-yellow-500 px-6 py-3 font-bold text-[#0a192f] transition-transform hover:scale-105 active:scale-95 shadow-[0_0_30px_rgba(234,179,8,0.3)]">
                        <span class="relative z-10">Login untuk Melapor</span>
                        <svg class="relative z-10 h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        <div class="absolute inset-0 bg-yellow-400 opacity-0 transition-opacity group-hover:opacity-100"></div>
                    </a>
                @else
                    <a href="{{ route('buat_pengaduan') }}" class="group relative inline-flex items-center justify-center gap-3 overflow-hidden rounded-full bg-yellow-500 px-6 py-3 font-bold text-[#0a192f] transition-transform hover:scale-105 active:scale-95 shadow-[0_0_30px_rgba(234,179,8,0.3)]">
                        <span class="relative z-10">Lapor Kasus Sekarang</span>
                        <svg class="relative z-10 h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        <div class="absolute inset-0 bg-yellow-400 opacity-0 transition-opacity group-hover:opacity-100"></div>
                    </a>
                @endguest
                <a href="{{ route('layanan_bantuan') }}" class="inline-flex items-center justify-center rounded-full border-2 border-white/20 bg-white/5 backdrop-blur-md px-6 py-3 font-bold text-white transition-all hover:bg-white/10 hover:border-white/40 shadow-xl">
                    <span>Hubungi Hotline</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Grid Section -->
<div class="relative z-30 max-w-7xl mx-auto px-6 -mt-16 mb-24">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white/95 backdrop-blur-2xl border border-white p-10 rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] hover:-translate-y-3 transition-all duration-500 group relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-8 -mt-8 h-40 w-40 rounded-full bg-blue-500/10 blur-3xl transition-transform duration-700 group-hover:scale-150"></div>
            <div class="relative z-10">
                <div class="flex h-16 w-16 items-center justify-center rounded-[1.25rem] bg-gradient-to-br from-blue-500 to-blue-700 text-white shadow-lg shadow-blue-500/30 mb-8">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h3 class="text-4xl font-black text-[#0a192f] tracking-tight">100%</h3>
                <p class="text-[11px] font-black text-slate-800 mt-3 uppercase tracking-widest">Kerahasiaan Data</p>
                <p class="text-sm text-slate-500 mt-4 leading-relaxed font-medium">Berhak mendapatkan perlindungan kelancaran studi/skripsi dan kerahasiaan identitas yang dienkripsi ganda.</p>
            </div>
        </div>

        <div class="bg-white/95 backdrop-blur-2xl border border-white p-10 rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] hover:-translate-y-3 transition-all duration-500 group relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-8 -mt-8 h-40 w-40 rounded-full bg-indigo-500/10 blur-3xl transition-transform duration-700 group-hover:scale-150"></div>
            <div class="relative z-10">
                <div class="flex h-16 w-16 items-center justify-center rounded-[1.25rem] bg-gradient-to-br from-indigo-500 to-purple-700 text-white shadow-lg shadow-indigo-500/30 mb-8">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-4xl font-black text-[#0a192f] tracking-tight">&lt; 3 Hari</h3>
                <p class="text-[11px] font-black text-slate-800 mt-3 uppercase tracking-widest">Respon Cepat</p>
                <p class="text-sm text-slate-500 mt-4 leading-relaxed font-medium">Penelaahan berkas awal oleh tim Satgas dilakukan sangat cepat untuk memberikan perlindungan dini.</p>
            </div>
        </div>

        <div class="bg-white/95 backdrop-blur-2xl border border-white p-10 rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] hover:-translate-y-3 transition-all duration-500 group relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-8 -mt-8 h-40 w-40 rounded-full bg-teal-500/10 blur-3xl transition-transform duration-700 group-hover:scale-150"></div>
            <div class="relative z-10">
                <div class="flex h-16 w-16 items-center justify-center rounded-[1.25rem] bg-gradient-to-br from-teal-400 to-emerald-600 text-white shadow-lg shadow-teal-500/30 mb-8">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <h3 class="text-4xl font-black text-[#0a192f] tracking-tight">Rp 0</h3>
                <p class="text-[11px] font-black text-slate-800 mt-3 uppercase tracking-widest">Bebas Biaya</p>
                <p class="text-sm text-slate-500 mt-4 leading-relaxed font-medium">Bantuan hukum dan konsultasi pemulihan bersama psikolog klinis berlisensi disediakan sepenuhnya gratis.</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Body Container -->
<div class="max-w-7xl mx-auto px-6 pb-32">
    <!-- Welcome Message Commitment -->
    <div class="flex flex-col lg:flex-row gap-20 items-center mb-32">
        <div class="lg:w-1/2 relative">
            <div class="absolute -inset-6 bg-gradient-to-tr from-blue-100 to-indigo-50 rounded-[3rem] -z-10 rotate-2 opacity-70"></div>
            <div class="absolute -inset-4 bg-gradient-to-bl from-amber-50 to-orange-50 rounded-[3rem] -z-10 -rotate-2 opacity-70"></div>
            <div class="bg-white/80 backdrop-blur-xl p-12 md:p-14 rounded-[3rem] shadow-xl border border-white relative overflow-hidden">
                <svg class="absolute top-0 right-0 -mt-10 -mr-10 h-64 w-64 text-slate-50/50 -z-10" fill="currentColor" viewBox="0 0 32 32"><path d="M10 14c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm16 0c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path><path d="M22 18H10c-3.3 0-6 2.7-6 6v2h24v-2c0-3.3-2.7-6-6-6z"></path></svg>
                
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-xs font-black tracking-widest uppercase mb-8">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path></svg>
                    Pernyataan Resmi
                </div>
                
                <h2 class="text-3xl md:text-4xl font-black text-[#0a192f] mb-8 leading-tight">Komitmen Rektorat & Senat UNIMUS</h2>
                <p class="text-lg md:text-xl text-slate-600 leading-relaxed font-medium">
                    "Universitas Muhammadiyah Semarang berkomitmen penuh menyelenggarakan lingkungan akademik yang bermartabat, beretika, dan islami. Kami menerapkan kebijakan toleransi nol <span class="text-blue-700 font-black border-b-2 border-blue-200">zero tolerance</span> terhadap segala bentuk kekerasan seksual, perundungan, pemerasan, dan diskriminasi."
                </p>
            </div>
        </div>
        
        <div class="lg:w-1/2 flex flex-col gap-10">
            <div class="flex gap-6 items-start group">
                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-[1.25rem] bg-blue-50 text-blue-600 transition-transform group-hover:scale-110 group-hover:rotate-3">
                    <span class="font-black text-xl">01</span>
                </div>
                <div class="pt-1">
                    <h3 class="text-xl font-bold text-[#0a192f] mb-3">Pendekatan Eksklusif & Rahasia</h3>
                    <p class="text-slate-500 font-medium leading-relaxed">Seluruh data yang masuk dijamin kerahasiaannya oleh kode etik ketat. Akses laporan hanya diberikan pada jajaran investigator tersertifikasi kami.</p>
                </div>
            </div>
            
            <div class="flex gap-6 items-start group">
                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-[1.25rem] bg-indigo-50 text-indigo-600 transition-transform group-hover:scale-110 group-hover:rotate-3">
                    <span class="font-black text-xl">02</span>
                </div>
                <div class="pt-1">
                    <h3 class="text-xl font-bold text-[#0a192f] mb-3">Konseling Klinis Menyeluruh</h3>
                    <p class="text-slate-500 font-medium leading-relaxed">Melibatkan psikolog berlisensi secara proaktif untuk memulihkan trauma mental akibat tindakan kekerasan atau perundungan siber.</p>
                </div>
            </div>
            
            <div class="flex gap-6 items-start group">
                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-[1.25rem] bg-teal-50 text-teal-600 transition-transform group-hover:scale-110 group-hover:rotate-3">
                    <span class="font-black text-xl">03</span>
                </div>
                <div class="pt-1">
                    <h3 class="text-xl font-bold text-[#0a192f] mb-3">Jalur Pelapor Anonim</h3>
                    <p class="text-slate-500 font-medium leading-relaxed">Mendukung perlindungan saksi mata dan korban secara tertutup yang sepenuhnya dilindungi oleh koridor dan bantuan hukum rektorat.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Education Section -->
    <div class="bg-gradient-to-br from-[#0f295a] to-[#0a192f] rounded-[3rem] p-10 md:p-16 border border-slate-700/50 shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPgo8cmVjdCB3aWR0aD0iOCIgaGVpZ2h0PSI4IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiLz4KPC9zdmc+')] opacity-20 z-0"></div>
        <div class="absolute -top-64 -right-64 h-[500px] w-[500px] rounded-full bg-blue-500/20 blur-[100px] pointer-events-none z-0"></div>
        
        <div class="relative z-10 text-center max-w-3xl mx-auto mb-16">
            <span class="text-[11px] font-black tracking-widest text-yellow-400 uppercase mb-4 block">Pusat Pengetahuan</span>
            <h2 class="text-3xl md:text-5xl font-black text-white">Edukasi & Pencegahan</h2>
            <p class="text-lg text-slate-300 mt-6 font-medium">Bantu kami mewujudkan lingkungan kampus Universitas Muhammadiyah Semarang yang sehat dan bermartabat dengan memahami batasan yang jelas.</p>
        </div>

        <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white/10 backdrop-blur-md p-10 rounded-[2rem] border border-white/10 hover:bg-white/15 transition-colors">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-3 w-3 rounded-full bg-pink-400 shadow-[0_0_10px_rgba(244,114,182,0.8)]"></div>
                    <h3 class="text-xl font-bold text-white">Kekerasan Seksual & Pelecehan</h3>
                </div>
                <p class="text-slate-300 leading-relaxed font-medium">
                    Tindakan fisik maupun verbal yang menyerang fungsi reproduksi, serta martabat seksual seseorang secara sepihak dan memaksa.
                </p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-md p-10 rounded-[2rem] border border-white/10 hover:bg-white/15 transition-colors">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-3 w-3 rounded-full bg-orange-400 shadow-[0_0_10px_rgba(251,146,60,0.8)]"></div>
                    <h3 class="text-xl font-bold text-white">Perundungan & Bullying</h3>
                </div>
                <p class="text-slate-300 leading-relaxed font-medium">
                    Perilaku penyerangan verbal, siber, maupun intimidasi berkelompok secara tidak seimbang yang dapat menyebabkan trauma psikis mendalam.
                </p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-md p-10 rounded-[2rem] border border-white/10 hover:bg-white/15 transition-colors">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-3 w-3 rounded-full bg-red-400 shadow-[0_0_10px_rgba(248,113,113,0.8)]"></div>
                    <h3 class="text-xl font-bold text-white">Kekerasan Fisik & Intimidasi</h3>
                </div>
                <p class="text-slate-300 leading-relaxed font-medium">
                    Tindakan penganiayaan fisik, ancaman kekerasan langsung, pemaksaan kehendak, atau bentuk pemerasan ekonomi di area kampus.
                </p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-md p-10 rounded-[2rem] border border-white/10 hover:bg-white/15 transition-colors">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-3 w-3 rounded-full bg-emerald-400 shadow-[0_0_10px_rgba(52,211,153,0.8)]"></div>
                    <h3 class="text-xl font-bold text-white">Hak Pendampingan Penuh</h3>
                </div>
                <p class="text-slate-300 leading-relaxed font-medium">
                    Setiap pelapor/korban berhak secara penuh atas konseling psikologis gratis, kerahasiaan identitas terjamin, perlindungan akademik, dan pendampingan advokasi hukum formal.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Carousel Script for Hero -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slidesWrapper = document.getElementById('carousel-slides');
        if (slidesWrapper) {
            const slides = slidesWrapper.children;
            const totalSlides = slides.length;
            let currentSlide = 0;

            function updateCarousel() {
                currentSlide = (currentSlide + 1) % totalSlides;
                slidesWrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
            }

            if (totalSlides > 1) {
                setInterval(updateCarousel, 8000);
            }
        }
    });
</script>
@endsection
