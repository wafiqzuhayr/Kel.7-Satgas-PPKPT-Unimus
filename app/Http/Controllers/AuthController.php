<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Tampilkan form Login.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses Login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Berhasil masuk ke portal Admin.');
            }

            return redirect()->route('beranda')->with('success', 'Berhasil masuk ke portal PPKPT.');
        }

        throw ValidationException::withMessages([
            'email' => ['Kredensial yang Anda masukkan tidak cocok dengan catatan kami.'],
        ]);
    }

    /**
     * Tampilkan form Registrasi.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Proses Registrasi.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.regex' => 'Nama lengkap hanya boleh berisi huruf dan spasi.',
            'email.unique' => 'Alamat email ini sudah terdaftar di sistem kami.',
            'password.min' => 'Password minimal harus terdiri dari 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('beranda')->with('success', 'Akun berhasil dibuat. Selamat datang di portal PPKPT.');
    }

    /**
     * Keluar Akun (Logout).
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('beranda')->with('success', 'Anda telah keluar dari akun.');
    }
    /**
     * Tampilkan form Lupa Password.
     */
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    /**
     * Proses pengiriman link pemulihan kata sandi.
     */
    public function processForgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.exists' => 'Kami tidak dapat menemukan pengguna dengan alamat email tersebut.',
        ]);

        // Karena ini purwarupa, kita asumsikan link terkirim.
        // Di aplikasi asli, kita akan menggunakan Password Broker dari Laravel.
        return back()->with('success', 'Jika email tersebut terdaftar, kami telah mengirimkan tautan pemulihan kata sandi. (Cek log server untuk detailnya)');
    }
}
