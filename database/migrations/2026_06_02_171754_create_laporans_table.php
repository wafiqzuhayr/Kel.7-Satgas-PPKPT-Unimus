<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->string('id')->primary(); // Kode laporan, e.g., RPT-xxxx
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Optional relation to logged-in user
            
            $table->string('nama');
            $table->string('no_hp');
            $table->string('nik_nim');
            $table->enum('status_pelapor', ['Dosen', 'Tenaga Kependidikan', 'Mahasiswa', 'Lainnya']);
            $table->string('unit_kerja_prodi');
            $table->enum('kategori_aduan', ['Kekerasan Fisik', 'Kekerasan Psikis', 'Perundungan', 'Kekerasan Seksual', 'Diskiriminasi dan Intimidasi', 'Kebijakan yang Mengandung Kekerasan', 'Lainnya']);
            $table->string('alasan_pengaduan');
            $table->string('kebutuhan_penyintas');
            $table->string('waktu_kejadian');
            $table->string('tempat_kejadian');
            $table->text('kronologi');
            $table->text('pihak_terlibat')->nullable();
            $table->string('bukti_file')->nullable();
            $table->boolean('bersedia_dihubungi')->default(false);
            
            $table->enum('status', ['Menunggu', 'Diproses', 'Selesai'])->default('Menunggu');
            $table->text('catatan_satgas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
