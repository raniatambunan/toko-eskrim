<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-to-r from-pink-400 via-purple-500 to-blue-600 text-white font-sans">

<header class="bg-white shadow-xl py-6">
    <nav class="container mx-auto flex justify-between items-center px-6">
        <a href="/" class="text-4xl font-bold text-pink-600 hover:text-pink-400 transition duration-300">Midsweet Creamery</a>
    </nav>
</header>

<main class="container mx-auto py-16">
    <h1 class="text-5xl font-extrabold mb-8 text-center text-white">Keranjang Belanja</h1>

    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-4xl mx-auto">
        @if(count($cart) > 0)
            <ul class="space-y-6">
                @foreach($cart as $item)
                    <li class="flex justify-between items-center border-b pb-4">
                        <div class="flex space-x-4 items-center">
                            <span class="font-medium text-lg text-gray-700">{{ $item['name'] }}</span>
                        </div>
                        <div class="flex space-x-4 items-center">
                            <span class="text-lg text-gray-700">Rp {{ number_format($item['price'], 0, ',', '.') }} x {{ $item['quantity'] }}</span>
                            <div class="flex items-center space-x-3">
                                <form action="/update-cart" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                    <button type="submit" name="action" value="decrease" class="bg-pink-600 text-white px-4 py-2 rounded-full hover:bg-pink-400 focus:outline-none transition duration-300">-</button>
                                </form>

                                <span class="text-lg font-semibold text-gray-800">{{ $item['quantity'] }}</span>

                                <form action="/update-cart" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                    <button type="submit" name="action" value="increase" class="bg-pink-600 text-white px-4 py-2 rounded-full hover:bg-pink-400 focus:outline-none transition duration-300">+</button>
                                </form>

                                <!-- Tombol Hapus Produk -->
                                <button class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-400 focus:outline-none transition duration-300" onclick="confirmDelete({{ $item['id'] }})">Hapus</button>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="mt-8 flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-gray-700">Total: Rp {{ number_format($total, 0, ',', '.') }}</h2>
            </div>

            <!-- Tombol Kembali ke Menu dan Tombol Checkout -->
            <div class="mt-8 flex justify-between items-center">
                <!-- Tombol Kembali ke Menu -->
                <a href="/" class="inline-block bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-400 focus:outline-none transition duration-300">Kembali ke Menu</a>

                <!-- Tombol Checkout dengan pengecekan login -->
                @if(auth()->check())
                    <!-- Jika sudah login, arahkan langsung ke halaman checkout -->
                    <a href="/checkout" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-400 focus:outline-none transition duration-300 text-xl font-semibold">Checkout</a>
                @else
                    <!-- Jika belum login, tampilkan SweetAlert untuk login atau daftar -->
                    <button onclick="showLoginAlert()" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-400 focus:outline-none transition duration-300 text-xl font-semibold">Checkout</button>
                @endif
            </div>

            @else
    <p class="text-center text-lg text-pink-600 mt-4">Keranjang Anda kosong. Silakan tambahkan produk!</p>
    <div class="text-center mt-6">
        <a href="/" class="inline-block bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-400 focus:outline-none transition duration-300">Kembali ke Halaman Utama</a>
    </div>
@endif
    </div>
</main>

<footer class="bg-pink-600 text-white py-6">
    <div class="text-center">
        <p class="text-sm">© 2024 Midsweet Creamery. Semua Hak Dilindungi.</p>
    </div>
</footer>

<script>
    // Fungsi untuk konfirmasi hapus produk
    function confirmDelete(productId) {
        Swal.fire({
            title: 'Hapus produk?',
            text: "Apakah Anda yakin ingin menghapus produk ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika ya, kirimkan permintaan POST ke server untuk menghapus produk
                window.location.href = "/remove-product?product_id=" + productId;
            }
        });
    }

    // Fungsi untuk menampilkan peringatan login jika belum login saat klik checkout
    function showLoginAlert() {
        Swal.fire({
            title: 'Mohon login terlebih dahulu',
            text: "Anda harus login atau daftar untuk melanjutkan ke checkout.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Login',
            cancelButtonText: 'Daftar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke halaman login
                window.location.href = "/login";
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Arahkan ke halaman daftar
                window.location.href = "/register";
            }
        });
    }
</script>

</body>
</html>
