@extends('layouts.app')

@section('title', 'Buat Pengaduan | Satgas PPKPT UNIMUS')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 mt-8 mb-16">
    <div class="mb-10 text-center">
        <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-50 px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-blue-700">
            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            Formulir Resmi
        </span>
        <h1 class="mt-4 text-3xl font-black text-[#0f295a] tracking-tight">Formulir Pengaduan <span class="text-amber-500">Satgas PPKPT</span></h1>
        <p class="mt-3 text-slate-500 font-medium max-w-2xl mx-auto text-sm leading-relaxed">Harap isi formulir di bawah ini dengan lengkap dan jujur. Identitas dan laporan Anda akan dijaga kerahasiaannya sesuai prosedur hukum yang berlaku.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-100 p-6 rounded-3xl mb-8 shadow-sm text-center">
            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 mb-4">
                <svg class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
            </div>
            <h3 class="text-lg font-black text-emerald-800 mb-2">Laporan Berhasil Terkirim!</h3>
            <p class="text-sm font-bold text-emerald-700 max-w-lg mx-auto">{{ session('success') }}</p>
            <div class="mt-6">
                <a href="{{ route('lacak_kasus') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-6 py-2.5 text-xs font-bold text-white shadow-md hover:bg-emerald-700 transition-colors">
                    Pantau Status Laporan
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </a>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-50 border border-red-100 p-5 rounded-2xl mb-8 shadow-sm">
            <div class="flex items-center gap-2 mb-2 text-red-700">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                <h3 class="text-sm font-bold">Terjadi Kesalahan Pengisian:</h3>
            </div>
            <ul class="list-disc pl-5 text-sm font-medium text-red-600 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buat_pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Bagian 1: Identitas Pelapor -->
        <div class="bg-white rounded-[2rem] border border-slate-100 p-6 md:p-10 shadow-sm">
            <h2 class="text-sm font-black text-[#0f295a] uppercase tracking-wider mb-6 flex items-center gap-2 border-b border-slate-100 pb-4">
                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 text-blue-700 text-xs">1</span>
                Identitas Pelapor
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama', Auth::user()->name) }}" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors">
                </div>

                <!-- No HP -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">No. HP (WhatsApp aktif) <span class="text-red-500">*</span></label>
                    <input type="number" name="no_hp" value="{{ old('no_hp') }}" required minlength="11" maxlength="13" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                </div>

                <!-- NIK / NIM -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">NIK / NIM <span class="text-red-500">*</span></label>
                    <input type="text" name="nik_nim" value="{{ old('nik_nim') }}" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors">
                </div>

                <!-- Status Pelapor -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Status <span class="text-red-500">*</span></label>
                    <select name="status_pelapor" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors appearance-none">
                        <option value="" disabled selected>-- Pilih Status --</option>
                        <option value="Dosen" {{ old('status_pelapor') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                        <option value="Tenaga Kependidikan" {{ old('status_pelapor') == 'Tenaga Kependidikan' ? 'selected' : '' }}>Tenaga Kependidikan</option>
                        <option value="Mahasiswa" {{ old('status_pelapor') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        <option value="Lainnya" {{ old('status_pelapor') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <!-- Unit Kerja / Program Studi -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Unit Kerja / Program Studi <span class="text-red-500">*</span></label>
                    <input type="text" name="unit_kerja_prodi" value="{{ old('unit_kerja_prodi') }}" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors">
                </div>
            </div>
        </div>

        <!-- Bagian 2: Kategori & Konteks Aduan -->
        <div class="bg-white rounded-[2rem] border border-slate-100 p-6 md:p-10 shadow-sm">
            <h2 class="text-sm font-black text-[#0f295a] uppercase tracking-wider mb-6 flex items-center gap-2 border-b border-slate-100 pb-4">
                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 text-blue-700 text-xs">2</span>
                Konteks Pengaduan
            </h2>

            <div class="space-y-6">
                <!-- Kategori Aduan -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-3">Kategori Aduan <span class="text-red-500">*</span></label>
                    <select name="kategori_aduan" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors">
                        <option value="" disabled selected>-- Pilih Kategori Utama --</option>
                        <option value="Kekerasan Fisik" {{ old('kategori_aduan') == 'Kekerasan Fisik' ? 'selected' : '' }}>Kekerasan Fisik</option>
                        <option value="Kekerasan Psikis" {{ old('kategori_aduan') == 'Kekerasan Psikis' ? 'selected' : '' }}>Kekerasan Psikis</option>
                        <option value="Perundungan" {{ old('kategori_aduan') == 'Perundungan' ? 'selected' : '' }}>Perundungan</option>
                        <option value="Kekerasan Seksual" {{ old('kategori_aduan') == 'Kekerasan Seksual' ? 'selected' : '' }}>Kekerasan Seksual</option>
                        <option value="Diskiriminasi dan Intimidasi" {{ old('kategori_aduan') == 'Diskiriminasi dan Intimidasi' ? 'selected' : '' }}>Diskriminasi dan Intimidasi</option>
                        <option value="Kebijakan yang Mengandung Kekerasan" {{ old('kategori_aduan') == 'Kebijakan yang Mengandung Kekerasan' ? 'selected' : '' }}>Kebijakan yang Mengandung Kekerasan</option>
                        <option value="Lainnya" {{ old('kategori_aduan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <!-- Alasan Pengaduan -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-3">Alasan Pengaduan <span class="text-red-500">*</span></label>
                    <select name="alasan_pengaduan" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors">
                        <option value="" disabled selected>-- Apa Alasan Melapor? --</option>
                        <option value="Penyintas membutuhkan bantuan psikologis" {{ old('alasan_pengaduan') == 'Penyintas membutuhkan bantuan psikologis' ? 'selected' : '' }}>Penyintas membutuhkan bantuan psikologis</option>
                        <option value="Pelapor adalah saksi/ pihak yang khawatir dengan kondisi penyintas" {{ old('alasan_pengaduan') == 'Pelapor adalah saksi/ pihak yang khawatir dengan kondisi penyintas' ? 'selected' : '' }}>Pelapor adalah saksi/ pihak yang khawatir dengan kondisi penyintas</option>
                        <option value="Pelapor adalah perantara/ pendamping penyintas" {{ old('alasan_pengaduan') == 'Pelapor adalah perantara/ pendamping penyintas' ? 'selected' : '' }}>Pelapor adalah perantara/ pendamping penyintas</option>
                        <option value="Pelapor ingin perguruan tinggi menindak pelaku" {{ old('alasan_pengaduan') == 'Pelapor ingin perguruan tinggi menindak pelaku' ? 'selected' : '' }}>Pelapor ingin perguruan tinggi menindak pelaku</option>
                        <option value="Pelapor ingin SATGAS UNIMUS mendokumentasikan kejadian, meningkatkan keamanan, dan memberikan perlindungan kepada saya" {{ old('alasan_pengaduan') == 'Pelapor ingin SATGAS UNIMUS mendokumentasikan kejadian, meningkatkan keamanan, dan memberikan perlindungan kepada saya' ? 'selected' : '' }}>Pelapor ingin SATGAS UNIMUS mendokumentasikan kejadian, meningkatkan keamanan, dll</option>
                        <option value="Pelapor/ Penyintas membutuhkan konsultasi hukum" {{ old('alasan_pengaduan') == 'Pelapor/ Penyintas membutuhkan konsultasi hukum' ? 'selected' : '' }}>Pelapor/ Penyintas membutuhkan konsultasi hukum</option>
                        <option value="Penyintas membutuhkan ruang aman segera/ dalam keadaan darurat" {{ old('alasan_pengaduan') == 'Penyintas membutuhkan ruang aman segera/ dalam keadaan darurat' ? 'selected' : '' }}>Penyintas membutuhkan ruang aman segera/ dalam keadaan darurat</option>
                        <option value="Yang lainnya" {{ old('alasan_pengaduan') == 'Yang lainnya' ? 'selected' : '' }}>Yang lainnya</option>
                    </select>
                </div>

                <!-- Identifikasi Kebutuhan Penyintas -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-3">Identifikasi Kebutuhan Penyintas <span class="text-red-500">*</span></label>
                    <select name="kebutuhan_penyintas" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors">
                        <option value="" disabled selected>-- Bantuan yang Diharapkan --</option>
                        <option value="Konseling Psikologis" {{ old('kebutuhan_penyintas') == 'Konseling Psikologis' ? 'selected' : '' }}>Konseling Psikologis</option>
                        <option value="Bantuan Hukum" {{ old('kebutuhan_penyintas') == 'Bantuan Hukum' ? 'selected' : '' }}>Bantuan Hukum</option>
                        <option value="Bantuan Medis" {{ old('kebutuhan_penyintas') == 'Bantuan Medis' ? 'selected' : '' }}>Bantuan Medis</option>
                        <option value="Tidak Membutuhkan Pendampingan/ Bantuan" {{ old('kebutuhan_penyintas') == 'Tidak Membutuhkan Pendampingan/ Bantuan' ? 'selected' : '' }}>Tidak Membutuhkan Pendampingan/ Bantuan</option>
                        <option value="Koordinasi dengan Satgas PPKPT dan/atau Perguruan Tinggi" {{ old('kebutuhan_penyintas') == 'Koordinasi dengan Satgas PPKPT dan/atau Perguruan Tinggi' ? 'selected' : '' }}>Koordinasi dengan Satgas PPKPT dan/atau Perguruan Tinggi</option>
                        <option value="Yang lainnya" {{ old('kebutuhan_penyintas') == 'Yang lainnya' ? 'selected' : '' }}>Yang lainnya</option>
                    </select>
                </div>
                
                <!-- Ketersediaan Dihubungi -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-3">Bersedia dihubungi untuk klarifikasi? <span class="text-red-500">*</span></label>
                    <div class="flex items-center gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="bersedia_dihubungi" value="1" {{ old('bersedia_dihubungi', '1') == '1' ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300">
                            <span class="text-sm font-bold text-slate-700">Ya</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="bersedia_dihubungi" value="0" {{ old('bersedia_dihubungi') == '0' ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300">
                            <span class="text-sm font-bold text-slate-700">Tidak</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian 3: Rincian Kejadian -->
        <div class="bg-white rounded-[2rem] border border-slate-100 p-6 md:p-10 shadow-sm">
            <h2 class="text-sm font-black text-[#0f295a] uppercase tracking-wider mb-6 flex items-center gap-2 border-b border-slate-100 pb-4">
                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 text-blue-700 text-xs">3</span>
                Rincian Kejadian
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Waktu Kejadian -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Waktu Kejadian <span class="text-red-500">*</span></label>
                    <input type="text" name="waktu_kejadian" placeholder="Contoh: 12 November 2023, Sore Hari" value="{{ old('waktu_kejadian') }}" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors">
                </div>

                <!-- Tempat Kejadian -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Tempat Kejadian <span class="text-red-500">*</span></label>
                    <input type="text" name="tempat_kejadian" placeholder="Contoh: Lab Komputer Gedung B" value="{{ old('tempat_kejadian') }}" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors">
                </div>

                <!-- Kronologi -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Kronologi Kejadian <span class="text-red-500">*</span></label>
                    <textarea name="kronologi" rows="6" required placeholder="Ceritakan secara urut bagaimana kejadian tersebut berlangsung..." class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors resize-none">{{ old('kronologi') }}</textarea>
                </div>

                <!-- Pihak Terlibat -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Pihak Terlibat (Opsional)</label>
                    <textarea name="pihak_terlibat" rows="3" placeholder="Sebutkan siapa saja yang terlibat (Misal: Nama pelaku, saksi, dsb)..." class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-colors resize-none">{{ old('pihak_terlibat') }}</textarea>
                </div>

                <!-- Lampiran Bukti -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Bukti Pendukung (Opsional)</label>
                    <div class="relative w-full rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-10 text-center hover:bg-slate-100 transition-colors">
                        <input type="file" name="bukti_file" class="absolute inset-0 z-10 w-full h-full opacity-0 cursor-pointer" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                        <svg class="mx-auto h-10 w-10 text-slate-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                        <p class="text-sm font-bold text-[#0f295a]">Klik atau seret file ke sini</p>
                        <p class="text-[11px] text-slate-500 font-medium mt-1">Mendukung file JPG, PNG, PDF, DOCX (Maks. 10MB)</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Kirim -->
        <div class="text-center pt-4">
            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#0f295a] to-blue-800 px-10 py-4 text-sm font-black text-white shadow-xl shadow-blue-900/30 hover:shadow-2xl hover:-translate-y-0.5 active:scale-95 transition-all w-full sm:w-auto min-w-[250px]">
                Kirim Laporan Resmi
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
            </button>
            <p class="mt-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Laporan anda dilindungi oleh tim Satgas</p>
        </div>
    </form>
</div>
@endsection
