<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Pastikan model Order di-import
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Mengambil pesanan pengguna yang sedang login
        $orders = Auth::user()->orders; // Mengambil data pesanan terkait dengan pengguna yang login

        // Pastikan data orders dikirim ke tampilan profile
        return view('profile', compact('orders')); // Mengirim data orders ke tampilan
    }
}
