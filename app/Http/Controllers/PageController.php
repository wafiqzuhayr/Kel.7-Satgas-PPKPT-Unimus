<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Tampilkan halaman Beranda & Edukasi.
     */
    public function beranda()
    {
        return view('pages.beranda');
    }

    /**
     * Tampilkan halaman Tentang Satgas (Tim G07).
     */
    public function tentangSatgas()
    {
        return view('pages.tentang_satgas');
    }

    /**
     * Tampilkan halaman Dokumen Resmi PPKPT.
     */
    public function dokumenResmi()
    {
        return view('pages.dokumen_resmi');
    }

    /**
     * Tampilkan halaman SOP / Alur Pelaporan.
     */
    public function sopPelaporan()
    {
        return view('pages.sop_pelaporan');
    }

    /**
     * Tampilkan halaman Layanan Bantuan & Hotline.
     */
    public function layananBantuan()
    {
        return view('pages.layanan_bantuan');
    }

    /**
     * Portal Terproteksi: Mulai Buat Pengaduan.
     */
    public function buatPengaduan()
    {
        return view('pages.buat_pengaduan');
    }

    /**
     * Portal Terproteksi: Pelacakan Kasus Korban.
     */
    public function lacakKasus()
    {
        return view('pages.lacak_kasus');
    }

    /**
     * Portal Terproteksi: Halaman Profil.
     */
    public function profile()
    {
        $laporans = \App\Models\Laporan::where('user_id', \Illuminate\Support\Facades\Auth::id())
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('pages.profile', compact('laporans'));
    }

    /**
     * Portal Terproteksi: Halaman Edit Profil
     */
    public function editProfile()
    {
        return view('pages.ubah_profil');
    }

    /**
     * Portal Terproteksi: Halaman Pengaturan.
     */
    public function settings()
    {
        return view('pages.settings');
    }

    /**
     * Portal Terproteksi: Halaman Ubah Password.
     */
    public function editPassword()
    {
        return view('pages.ubah_password');
    }

    /**
     * Memperbarui Password Pengguna.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.current_password' => 'Kata sandi saat ini tidak cocok.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        $user = \Illuminate\Support\Facades\Auth::user();
        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Kata sandi berhasil diperbarui!');
    }

    /**
     * Update Profile Data
     */
    public function updateProfile(\Illuminate\Http\Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'identity_number' => 'nullable|string|max:50',
            'department' => 'nullable|string|max:100',
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->identity_number = $request->identity_number;
        $user->department = $request->department;

        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            if ($request->file('avatar')->isValid()) {
                try {
                    // Hapus avatar lama jika ada
                    if ($user->avatar && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->avatar)) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($user->avatar);
                    }
                    
                    // Simpan avatar baru
                    $path = $request->file('avatar')->store('avatars', 'public');
                    $user->avatar = $path;
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['avatar' => 'Gagal mengunggah foto. Sistem saat ini berjalan pada mode Serverless (Read-Only).'])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['avatar' => 'File foto profil rusak atau melebihi batas ukuran maksimal server.'])->withInput();
            }
        } elseif ($request->has('avatar') && $request->avatar != null) {
            // Ini terjadi jika file melebihi upload_max_filesize di php.ini
            return redirect()->back()->withErrors(['avatar' => 'Ukuran file foto profil terlalu besar untuk diproses server.'])->withInput();
        }

        $user->save();

        return redirect()->back()->with('success', 'Data pribadi berhasil diperbarui.');
    }
}
