<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menambah produk ke keranjang
    public function addProductToCart(Request $request)
    {
        $products = [
            'chocolate' => ['id' => 1, 'name' => 'Cokelat Lezat', 'price' => 25000],
            'strawberry' => ['id' => 2, 'name' => 'Mimpi Stroberi', 'price' => 23000],
            'vanilla' => ['id' => 3, 'name' => 'Vanila Klasik', 'price' => 20000],
            'caramel' => ['id' => 4, 'name' => 'Caramel Impian', 'price' => 22000],
            'mint' => ['id' => 5, 'name' => 'Cokelat Mint Segar', 'price' => 24000],
            'krispi' => ['id' => 6, 'name' => 'Krispi Kacang', 'price' => 26000],
            'redvelvet' => ['id' => 7, 'name' => 'Red Velvet Manis', 'price' => 27000],
            'mangga' => ['id' => 8, 'name' => 'Mangga Surga', 'price' => 23000],
            'coconut' => ['id' => 9, 'name' => 'Coconut Breeze', 'price' => 25000],
            'tiramisu' => ['id' => 10, 'name' => 'Tiramisu Delight', 'price' => 28000],
        ];

        // Validasi input request
        $request->validate([
            'product' => 'required|string|in:chocolate,strawberry,vanilla,caramel,mint,krispi,redvelvet,mangga,coconut,tiramisu',
            'quantity' => 'required|integer|min:1',
        ]);

        // Mengambil produk dan kuantitas dari request
        $productKey = $request->input('product');
        $quantity = $request->input('quantity', 1); // Default quantity is 1 if not provided

        // Memastikan produk yang dipilih ada dalam daftar produk
        if (array_key_exists($productKey, $products)) {
            $selectedProduct = $products[$productKey];
            $selectedProduct['quantity'] = $quantity;

            // Menambahkan produk ke dalam keranjang (session)
            $cart = session()->get('cart', []);

            // Cek jika produk sudah ada dalam keranjang
            $exists = false;
            foreach ($cart as &$item) {
                if ($item['id'] == $selectedProduct['id']) {
                    $item['quantity'] += $quantity;  // Update quantity jika produk sudah ada
                    $exists = true;
                    break;
                }
            }

            // Jika produk belum ada, tambahkan produk baru ke dalam keranjang
            if (!$exists) {
                $cart[] = $selectedProduct;
            }

            // Simpan kembali keranjang ke session
            session()->put('cart', $cart);
        }

        // Redirect ke halaman keranjang
        return redirect()->route('cart.view');
    }

    // Menampilkan isi keranjang
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        // Menghitung total harga
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart', compact('cart', 'total')); // Menampilkan tampilan keranjang
    }

    // Mengupdate keranjang (menambah atau mengurangi jumlah produk)
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');
        $action = $request->input('action');

        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                if ($action == 'increase') {
                    $item['quantity']++;
                } elseif ($action == 'decrease' && $item['quantity'] > 1) {
                    $item['quantity']--;
                }
                break;
            }
        }

        // Simpan kembali keranjang yang sudah diperbarui ke session
        session()->put('cart', $cart);

        // Redirect kembali ke halaman keranjang
        return redirect()->route('cart.view');
    }

    // Menghapus produk dari keranjang
    public function removeProduct(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');

        // Hapus produk dari keranjang
        $cart = array_filter($cart, function ($item) use ($productId) {
            return $item['id'] != $productId;
        });

        // Simpan kembali keranjang ke session
        session()->put('cart', array_values($cart));

        // Redirect kembali ke halaman keranjang
        return redirect()->route('cart.view');
    }
}
