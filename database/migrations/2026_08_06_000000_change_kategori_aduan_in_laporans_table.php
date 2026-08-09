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
        Schema::table('laporans', function (Blueprint $table) {
            $table->string('kategori_aduan', 255)->change();
            $table->string('status_pelapor', 100)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->enum('status_pelapor', ['Dosen', 'Tenaga Kependidikan', 'Mahasiswa', 'Lainnya'])->change();
            $table->enum('kategori_aduan', ['Kekerasan Fisik', 'Kekerasan Psikis', 'Perundungan', 'Kekerasan Seksual', 'Diskiriminasi dan Intimidasi', 'Kebijakan yang Mengandung Kekerasan', 'Lainnya'])->change();
        });
    }
};
