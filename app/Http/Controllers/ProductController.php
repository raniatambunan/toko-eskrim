<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan produk pada halaman utama
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Menampilkan halaman order (hanya untuk pengguna yang sudah login)
    public function order(Product $product)
    {
        return view('products.order', compact('product'));
    }
}
