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
            if (!Schema::hasColumn('laporans', 'tipe_pengaduan')) {
                $table->string('tipe_pengaduan')->default('Satgas PPKPT')->after('user_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            if (Schema::hasColumn('laporans', 'tipe_pengaduan')) {
                $table->dropColumn('tipe_pengaduan');
            }
        });
    }
};
