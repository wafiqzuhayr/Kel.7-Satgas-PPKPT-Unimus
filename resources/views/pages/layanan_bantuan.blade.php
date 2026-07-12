@extends('layouts.app')

@section('title', 'Layanan Bantuan | Satgas PPKPT UNIMUS')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 mt-8 mb-16">
    <div class="text-center mb-12">
        <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-50 px-3 py-1 text-xs font-bold text-blue-600 mb-3">
            Pusat Bantuan 24/7
        </span>
        <h1 class="text-3xl md:text-4xl font-black text-[#0f295a] tracking-tight">Kontak & Layanan Darurat</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium max-w-2xl mx-auto">Kami siap mendengar dan membantu Anda kapanpun dibutuhkan. Jangan ragu, Anda tidak sendirian.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Hotline -->
        <div class="bg-gradient-to-br from-[#0f295a] to-[#1e40af] text-white rounded-3xl p-8 shadow-lg relative overflow-hidden group">
            <div class="absolute -right-10 -bottom-10 opacity-10 transition-transform group-hover:scale-110">
                <svg class="h-48 w-48" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
            </div>
            <div class="relative z-10">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-yellow-400 text-[#0f295a] mb-6 shadow-md">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                </div>
                <h2 class="text-xl font-black mb-2 tracking-wide">Hotline Satgas (24 Jam)</h2>
                <p class="text-[13px] text-blue-100 mb-6 font-medium leading-relaxed">Hubungi nomor darurat kami via panggilan suara atau WhatsApp untuk penanganan kasus krisis seketika.</p>
                <div class="text-3xl font-black text-yellow-400 tracking-tight">+62 812-3456-7890</div>
            </div>
        </div>

        <!-- Konseling -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:-translate-y-1 transition-transform">
            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 mb-6 border border-emerald-100">
                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" /></svg>
            </div>
            <h2 class="text-xl font-black text-[#0f295a] mb-2 tracking-wide">Jadwalkan Konseling</h2>
            <p class="text-[13px] text-slate-500 mb-6 font-medium leading-relaxed">Merasa trauma atau cemas akibat kejadian tidak menyenangkan? Kami menyediakan layanan konseling privat dengan psikolog klinis internal UNIMUS secara gratis.</p>
            <a href="mailto:konseling.ppkpt@unimus.ac.id" class="inline-flex items-center justify-center w-full rounded-xl bg-slate-50 border border-slate-200 text-slate-700 hover:bg-slate-100 px-5 py-3 text-[13px] font-bold transition-colors">
                konseling.ppkpt@unimus.ac.id
            </a>
        </div>

        <!-- QR Code Pengaduan -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:-translate-y-1 transition-transform flex flex-col items-center justify-center text-center">
            <h2 class="text-xl font-black text-[#0f295a] mb-2 tracking-wide">Pindai & Lapor Cepat</h2>
            <p class="text-[13px] text-slate-500 mb-5 font-medium leading-relaxed">Gunakan kamera HP Anda untuk memindai Barcode (QR Code) ini dan langsung menuju form pengaduan.</p>
            <div class="p-3 bg-white border border-slate-200 rounded-2xl shadow-sm mb-4">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(route('buat_pengaduan')) }}" alt="QR Code Buat Pengaduan" class="w-32 h-32 object-contain">
            </div>
            <a href="{{ route('buat_pengaduan') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 underline underline-offset-4">Atau klik tautan ini</a>
        </div>
    </div>

    <!-- Peta Lokasi -->
    <div class="mt-8 bg-white border border-slate-100 rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
        <div class="flex flex-col md:flex-row gap-8 items-center">
            <div class="w-full md:w-1/2">
                <div class="bg-slate-100 rounded-2xl h-64 w-full flex items-center justify-center text-slate-400 overflow-hidden relative">
                    <!-- Placeholder Map Image using standard img tag, but since we don't have a map asset, just use a generic icon + background -->
                    <div class="absolute inset-0 bg-blue-50/50"></div>
                    <svg class="h-16 w-16 text-blue-200 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" /></svg>
                </div>
            </div>
            <div class="w-full md:w-1/2 space-y-4">
                <h2 class="text-xl font-black text-[#0f295a]">Sekretariat Fisik Satgas</h2>
                <p class="text-sm text-slate-600 font-medium leading-relaxed">
                    Jika Anda merasa lebih aman untuk berdiskusi secara langsung, silakan datang ke Ruang Sekretariat Khusus Satgas PPKPT yang dijamin kerahasiaannya.
                </p>
                <div class="space-y-2 mt-4 text-sm text-slate-700 font-medium">
                    <p class="flex items-start gap-2.5">
                        <svg class="h-5 w-5 text-blue-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        Gedung Rektorat Lt. 2, Kampus Terpadu UNIMUS<br>Kedungmundu, Kec. Tembalang, Kota Semarang.
                    </p>
                    <p class="flex items-center gap-2.5">
                        <svg class="h-5 w-5 text-blue-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        Senin - Jumat | 08.00 - 16.00 WIB
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
