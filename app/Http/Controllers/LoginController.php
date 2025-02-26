<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi data login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Cek kredensial login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Jika login sukses, redirect ke halaman utama atau halaman yang diinginkan
            return redirect()->route('home');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Kredensial yang dimasukkan tidak valid.',
        ]);
    }

    // Logout user
    public function logout()
    {
        Auth::logout();

        // Redirect ke halaman utama setelah logout
        return redirect()->route('home');
    }
}
