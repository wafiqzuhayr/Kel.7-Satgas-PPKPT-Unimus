@extends('layouts.app')

@section('title', 'SOP Pelaporan | Satgas PPKPT UNIMUS')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 mt-8 mb-16">
    <div class="text-center mb-12">
        <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-50 px-3 py-1 text-xs font-bold text-blue-600 mb-3">
            Standar Operasional
        </span>
        <h1 class="text-3xl md:text-4xl font-black text-[#0f295a] tracking-tight">Alur Pelaporan & Penanganan</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium max-w-2xl mx-auto">Kami memastikan seluruh laporan ditangani dengan profesional, cepat, dan mengedepankan hak perlindungan korban.</p>
    </div>

    <div class="bg-white border border-slate-100 rounded-3xl p-8 md:p-12 shadow-[0_8px_30px_rgb(0,0,0,0.04)] relative">
        <div class="absolute left-[39px] md:left-[51px] top-12 bottom-12 w-0.5 bg-blue-100"></div>

        <div class="space-y-12 relative z-10">
            <!-- Step 1 -->
            <div class="flex gap-6 group">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-50 border border-blue-200 text-blue-600 font-black shadow-sm group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all z-10 relative">
                    1
                </div>
                <div class="pt-2">
                    <h3 class="text-lg font-black text-[#0f295a] mb-2">Penerimaan Laporan</h3>
                    <p class="text-sm text-slate-600 leading-relaxed font-medium">Pelapor (korban/saksi) mengisi formulir pengaduan melalui portal online ini atau datang langsung ke ruang sekretariat Satgas PPKPT UNIMUS. Identitas dapat disamarkan (anonim).</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex gap-6 group">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-50 border border-blue-200 text-blue-600 font-black shadow-sm group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all z-10 relative">
                    2
                </div>
                <div class="pt-2">
                    <h3 class="text-lg font-black text-[#0f295a] mb-2">Verifikasi & Penelaahan Awal (< 3 Hari)</h3>
                    <p class="text-sm text-slate-600 leading-relaxed font-medium">Satgas melakukan asesmen kelayakan awal untuk menentukan status darurat. Jika diperlukan perlindungan mendesak (ancaman fisik), satgas akan langsung mengamankan korban.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex gap-6 group">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-50 border border-blue-200 text-blue-600 font-black shadow-sm group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all z-10 relative">
                    3
                </div>
                <div class="pt-2">
                    <h3 class="text-lg font-black text-[#0f295a] mb-2">Pemeriksaan & Konseling</h3>
                    <p class="text-sm text-slate-600 leading-relaxed font-medium">Pemanggilan pelapor untuk wawancara mendalam bersama psikolog klinis tersertifikasi dan ahli hukum. Bukti-bukti digital maupun fisik dikumpulkan secara aman.</p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="flex gap-6 group">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-50 border border-blue-200 text-blue-600 font-black shadow-sm group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all z-10 relative">
                    4
                </div>
                <div class="pt-2">
                    <h3 class="text-lg font-black text-[#0f295a] mb-2">Sidang Etik & Putusan Sanksi</h3>
                    <p class="text-sm text-slate-600 leading-relaxed font-medium">Jika bukti kuat, pelaku akan dipanggil dalam sidang etik. Rektor UNIMUS akan menerbitkan Surat Keputusan Sanksi (mulai dari teguran hingga Pemberhentian Tidak Dengan Hormat / DO).</p>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="flex gap-6 group">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-50 border border-blue-200 text-blue-600 font-black shadow-sm group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all z-10 relative">
                    5
                </div>
                <div class="pt-2">
                    <h3 class="text-lg font-black text-[#0f295a] mb-2">Pemulihan Terpadu</h3>
                    <p class="text-sm text-slate-600 leading-relaxed font-medium">Korban akan terus didampingi untuk memastikan pemulihan trauma psikologis berhasil dan hak akademiknya (seperti perkuliahan/kelulusan) tidak terganggu oleh kasus tersebut.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
