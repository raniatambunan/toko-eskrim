<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

// Route untuk homepage
Route::get('/', [ProductController::class, 'index'])->name('home');

// Route untuk login dan sign up
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk menambah produk ke keranjang (tanpa login)
Route::post('/order', [OrderController::class, 'addProductToCart'])->name('order.add');

// Route untuk melihat keranjang
Route::get('/cart', [OrderController::class, 'viewCart'])->name('cart.view');

// Route untuk mengupdate keranjang (menambah atau mengurangi jumlah produk)
Route::post('/update-cart', [OrderController::class, 'updateCart'])->name('cart.update');

// Menghapus produk dari keranjang
Route::get('/remove-product', [OrderController::class, 'removeProduct'])->name('cart.remove');

// Route untuk checkout, hanya bisa diakses jika sudah login
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/process-checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

// Route untuk profil
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile')->middleware('auth');

// Rute untuk halaman profil pengguna
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile')->middleware('auth');

// Rute untuk halaman edit profil
Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit')->middleware('auth');

// Rute untuk memperbarui informasi profil pengguna
Route::post('/profile/edit', [AuthController::class, 'updateProfile'])->name('profile.update')->middleware('auth');
