<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/tentang-satgas', [PageController::class, 'tentangSatgas'])->name('tentang_satgas');
Route::get('/dokumen-resmi', [PageController::class, 'dokumenResmi'])->name('dokumen_resmi');
Route::get('/dokumen-viewer', [PageController::class, 'dokumenViewer'])->name('dokumen_viewer');
Route::get('/sop-pelaporan', [PageController::class, 'sopPelaporan'])->name('sop_pelaporan');
Route::get('/layanan-bantuan', [PageController::class, 'layananBantuan'])->name('layanan_bantuan');

// Portal Terproteksi (Laporan & Profil)
Route::middleware('auth')->group(function () {
    Route::get('/buat-pengaduan', [PageController::class, 'buatPengaduan'])->name('buat_pengaduan');
    Route::post('/buat-pengaduan', [LaporanController::class, 'store'])->name('buat_pengaduan.store');
    
    // Profil & Pengaturan
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [PageController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [PageController::class, 'updateProfile'])->name('profile.update');
    Route::get('/settings', [PageController::class, 'settings'])->name('settings');
    Route::post('/settings', [PageController::class, 'updateSettings'])->name('settings.update');
    Route::get('/settings/password', [PageController::class, 'editPassword'])->name('password.edit');
    Route::post('/settings/password', [PageController::class, 'updatePassword'])->name('password.update');
    
    // Pemantauan Laporan
    Route::get('/lacak-kasus', [PageController::class, 'lacakKasus'])->name('lacak_kasus');
    Route::get('/lacak-kasus/search', [LaporanController::class, 'search'])->name('lacak_kasus.search');
});

// Autentikasi (Hanya diakses jika Belum Login / guest)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Lupa Password
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'processForgotPassword'])->name('password.email');
});

// Logout (Hanya diakses jika Sudah Login)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Dashboard Admin (Dilindungi Auth dan AdminMiddleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/laporan', [AdminController::class, 'indexLaporan'])->name('laporan.index');
    Route::get('/laporan/export-excel', [AdminController::class, 'exportExcel'])->name('laporan.export');
    Route::get('/laporan/excel-online', [AdminController::class, 'excelOnline'])->name('laporan.excel_online');
    Route::get('/laporan/open-excel', [AdminController::class, 'exportExcel'])->name('laporan.open_excel');
    Route::get('/laporan/{id}', [AdminController::class, 'showLaporan'])->where('id', '^(?!export-excel|open-excel).*$')->name('laporan.show');
    Route::post('/laporan/{id}/update', [AdminController::class, 'updateLaporan'])->name('laporan.update');
    
    // Berita Kegiatan CRUD
    Route::get('/berita', [App\Http\Controllers\AdminBeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [App\Http\Controllers\AdminBeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [App\Http\Controllers\AdminBeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [App\Http\Controllers\AdminBeritaController::class, 'edit'])->name('berita.edit');
    Route::post('/berita/{id}/update', [App\Http\Controllers\AdminBeritaController::class, 'update'])->name('berita.update');
    Route::post('/berita/{id}/delete', [App\Http\Controllers\AdminBeritaController::class, 'destroy'])->name('berita.destroy');
});

// Berita Kegiatan Publik
Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [App\Http\Controllers\BeritaController::class, 'show'])->name('berita.show');

// Live API Feed for Excel Online & Google Sheets
Route::get('/api/excel-feed', [AdminController::class, 'apiExcelFeed'])->name('api.excel_feed');

// Route sementara untuk menjalankan migrasi database di Vercel
Route::get('/run-migrations-production-force', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return 'Migrasi Database Berhasil Dijalankan di Vercel! Silakan kembali ke website.';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
