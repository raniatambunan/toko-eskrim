<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function show()
    {
        // Mengambil data keranjang belanja, misalnya dari session atau database
        $cart = session('cart', []); // Anda bisa mengganti ini dengan model atau repository jika perlu
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout', compact('cart', 'total'));
    }

    // Proses checkout
    public function processCheckout(Request $request)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'payment_method' => 'required|string|in:cod,transfer',
        ]);

        // Proses checkout (misalnya, simpan ke database atau kirim email)
        // Anda bisa menambahkan logika di sini untuk memproses pesanan

        // Contoh penyimpanan pesanan ke database (jika diperlukan)
        // Order::create([
        //     'name' => $request->name,
        //     'address' => $request->address,
        //     'phone' => $request->phone,
        //     'payment_method' => $request->payment_method,
        //     'total' => $total,
        // ]);

        // Menghapus keranjang belanja setelah checkout selesai
        session()->forget('cart');

        // Mengarahkan ke halaman konfirmasi atau terima kasih
        return redirect()->route('checkout.show')->with('success', 'Pesanan Anda berhasil diproses! Terima kasih telah berbelanja di Midsweet Creamery.');
    }
}
