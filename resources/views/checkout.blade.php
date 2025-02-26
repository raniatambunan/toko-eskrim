<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
    <h1 class="text-5xl font-extrabold mb-8 text-center text-white">Checkout</h1>

    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-4xl mx-auto">
        <h2 class="text-3xl font-semibold text-gray-700 mb-6">Ringkasan Pesanan</h2>

        <ul class="space-y-4">
            @foreach($cart as $item)
                <li class="flex justify-between items-center border-b pb-4">
                    <span class="text-lg text-gray-700">{{ $item['name'] }}</span>
                    <span class="text-lg text-gray-700">Rp {{ number_format($item['price'], 0, ',', '.') }} x {{ $item['quantity'] }}</span>
                </li>
            @endforeach
        </ul>

        <div class="mt-6 flex justify-between items-center">
            <h3 class="text-2xl font-semibold text-gray-700">Total: Rp {{ number_format($total, 0, ',', '.') }}</h3>
        </div>

        <form action="/process-checkout" method="POST" id="checkoutForm" class="mt-8">
            @csrf
            <h2 class="text-3xl font-semibold text-gray-700 mb-6">Informasi Pengiriman</h2>

            <div class="space-y-4">
                <!-- Nama Lengkap -->
                <div>
                    <label for="name" class="block text-lg text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 mt-2 rounded-md border border-gray-300 text-gray-800 placeholder-gray-500" placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Alamat Pengiriman -->
                <div>
                    <label for="address" class="block text-lg text-gray-700">Alamat Pengiriman</label>
                    <input type="text" id="address" name="address" class="w-full px-4 py-2 mt-2 rounded-md border border-gray-300 text-gray-800 placeholder-gray-500" placeholder="Masukkan alamat pengiriman" required>
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <label for="phone" class="block text-lg text-gray-700">Nomor Telepon</label>
                    <input type="text" id="phone" name="phone" class="w-full px-4 py-2 mt-2 rounded-md border border-gray-300 text-gray-800 placeholder-gray-500" placeholder="Masukkan nomor telepon" required>
                </div>

                <!-- Metode Pembayaran -->
                <div>
                    <label for="payment_method" class="block text-lg text-gray-700">Metode Pembayaran</label>
                    <select id="payment_method" name="payment_method" class="w-full px-4 py-2 mt-2 rounded-md border border-gray-300 text-gray-800 bg-white placeholder-gray-500" required>
                        <option value="cod">Cash on Delivery (COD)</option>
                        <option value="transfer">Transfer Bank</option>
                    </select>
                </div>
            </div>

            <!-- Tombol Proses Checkout dan Batalkan Checkout -->
            <div class="mt-8 text-center flex justify-between">
                <button type="button" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-400 focus:outline-none transition duration-300 text-xl font-semibold"
                        onclick="processCheckout()">
                    Proses Checkout
                </button>

                <button type="button" class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-400 focus:outline-none transition duration-300 text-xl font-semibold" onclick="cancelCheckout()">
                    Batalkan Checkout
                </button>
            </div>
        </form>
    </div>
</main>

<footer class="bg-pink-600 text-white py-6">
    <div class="text-center">
        <p class="text-sm">© 2024 Midsweet Creamery. Semua Hak Dilindungi.</p>
    </div>
</footer>

<script>
    // Fungsi untuk menampilkan notifikasi setelah checkout
    function processCheckout() {
        Swal.fire({
            title: 'Pemesanan Sedang Diproses',
            text: 'Terima kasih telah memesan! Kami akan segera memproses pesanan Anda.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            // Setelah pengguna menekan tombol OK, form akan dikirim untuk memproses pesanan
            document.getElementById('checkoutForm').submit();

            // Arahkan ke halaman utama setelah formulir terkirim
            setTimeout(() => {
                window.location.href = "/";
            }, 500); // waktu tunggu sebentar untuk memastikan pengiriman selesai
        });
    }

    // Fungsi untuk konfirmasi batalkan checkout
    function cancelCheckout() {
        Swal.fire({
            title: 'Batalkan Checkout?',
            text: "Apakah Anda yakin ingin membatalkan checkout dan kembali ke halaman keranjang?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Batalkan',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna memilih untuk membatalkan, arahkan mereka ke halaman cart
                window.location.href = "/cart"; // Gantilah dengan rute yang sesuai untuk halaman cart
            }
        });
    }
</script>

</body>
</html>
