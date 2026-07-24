<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BeritaKegiatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Satgas
        User::firstOrCreate(
            ['email' => 'admin.satgas@unimus.ac.id'],
            [
                'name' => 'Admin Satgas PPKPT',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // Regular User
        User::firstOrCreate(
            ['email' => 'mahasiswa@student.unimus.ac.id'],
            [
                'name' => 'Mahasiswa Test',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]
        );

        // Sample Berita Kegiatan
        if (BeritaKegiatan::count() === 0) {
            BeritaKegiatan::create([
                'judul' => 'Sosialisasi Pencegahan Kekerasan Seksual & Perundungan di Lingkungan Kampus UNIMUS',
                'slug' => 'sosialisasi-pencegahan-kekerasan-seksual-dan-perundungan-unimus',
                'konten' => "Satuan Tugas Pencegahan dan Penanganan Kekerasan Seksual, Perundungan, dan Kekerasan Lainnya (Satgas PPKPT) Universitas Muhammadiyah Semarang mengadakan kegiatan sosialisasi edukatif untuk seluruh civitas akademika UNIMUS.\n\nKegiatan ini bertujuan untuk menciptakan lingkungan kampus yang aman, terlindungi, dan bebas dari segala bentuk diskriminasi serta intimidasi. Seluruh mahasiswa dan sivitas akademika diajak untuk aktif melaporkan dan saling menjaga.",
                'gambar' => '/campus1.jpg',
                'is_published' => true,
            ]);

            BeritaKegiatan::create([
                'judul' => 'Peluncuran Layanan Pengaduan Digital Satgas PPKPT & Student Safety UNIMUS',
                'slug' => 'peluncuran-layanan-pengaduan-digital-satgas-ppkpt-student-safety',
                'konten' => "Sebagai bentuk komitmen nyata dalam memberikan perlindungan bagi seluruh mahasiswa dan staf, UNIMUS resmi meluncurkan portal sistem informasi pengaduan terpadu.\n\nSistem ini menjamin kerahasiaan identitas pelapor, memberikan pendampingan psikologis, medis, dan penanganan hukum yang transparan dan profesional.",
                'gambar' => '/campus2.jpg',
                'is_published' => true,
            ]);

            BeritaKegiatan::create([
                'judul' => 'Pelatihan Pendampingan Psikologis dan Advokasi Hukum Tim Satgas PPKPT',
                'slug' => 'pelatihan-pendampingan-psikologis-dan-advokasi-hukum-tim-satgas',
                'konten' => "Tim Satgas PPKPT UNIMUS menyelenggarakan pelatihan intensif penanganan kasus bersama pakar psikologi klinis dan lembaga advokasi hukum.\n\nPelatihan ini difokuskan pada peningkatan respon cepat dan pendampingan empati bagi pelapor dan korban kekerasan di kampus.",
                'gambar' => '/campus1.jpg',
                'is_published' => true,
            ]);
        }
    }
}
