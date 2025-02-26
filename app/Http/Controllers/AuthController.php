<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Proses login
        if (Auth::attempt($request->only('email', 'password'))) {
            Log::info('User logged in: ' . $request->email); // Logging berhasil login
            return redirect()->intended('/');
        }

        Log::warning('Failed login attempt: ' . $request->email); // Logging gagal login
        return back()->withErrors(['login' => 'Invalid credentials']);
    }

    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        Log::info('New user registered and logged in: ' . $request->email); // Logging registrasi sukses

        return redirect('/');
    }

    // Proses logout
    public function logout()
    {
        Auth::logout(); // Menghapus sesi pengguna
        Log::info('User logged out');
        return redirect('/login');
    }

    // Menampilkan halaman profil pengguna
    public function showProfile()
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Mengembalikan tampilan profil dengan data pengguna
        return view('profile', compact('user'));
    }

    // Menampilkan form untuk mengedit profil pengguna
    public function editProfile()
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Mengembalikan tampilan dengan data pengguna untuk form edit
        return view('auth.edit-profile', compact('user'));
    }

    // Proses pembaruan data profil pengguna
    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6|confirmed', // Password opsional
        ]);

        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Perbarui data pengguna
        $user->name = $request->name;
        $user->email = $request->email;

        // Jika password diisi, perbarui password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        // Log perubahan profil
        Log::info('User updated their profile: ' . $user->email);

        // Arahkan kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
