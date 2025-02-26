<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-pink-300 via-purple-400 to-indigo-500 text-white font-sans">

<!-- Main Content -->
<main class="flex items-center justify-center min-h-screen py-16 px-6 sm:px-8 lg:px-16">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-xl border-2 border-gray-100">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-pink-600 mb-6">Masuk ke Akun Anda</h2>
            <p class="text-md text-gray-600">Masukkan informasi akun Anda untuk melanjutkan.</p>
        </div>

        <form class="mt-8 space-y-6" method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="rounded-md shadow-sm -space-y-px">
                <!-- Input Email -->
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                           class="appearance-none rounded-md relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 sm:text-lg"
                           placeholder="Email Anda">
                </div>

                <!-- Input Password -->
                <div class="mt-4">
                    <label for="password" class="sr-only">Kata Sandi</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                           class="appearance-none rounded-md relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 sm:text-lg"
                           placeholder="Kata Sandi Anda">
                </div>
            </div>

            <!-- Forgot Password & Login Button -->
            <div class="flex items-center justify-between mt-6">
                <div class="text-sm">
                    <a href="#" class="font-medium text-pink-600 hover:text-pink-400">
                        Lupa kata sandi?
                    </a>
                </div>
                <div>
                    <button type="submit"
                            class="group relative w-full py-3 px-4 border border-transparent text-sm font-semibold rounded-md text-white bg-pink-600 hover:bg-pink-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                        Masuk
                    </button>
                </div>
            </div>
        </form>

        <!-- Sign Up & Return to Home -->
        <div class="text-center text-sm mt-6">
            <p class="text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-pink-600 hover:text-pink-400">Daftar di sini</a></p>
            <div class="mt-4">
                <a href="{{ url('/') }}" class="text-pink-600 hover:text-pink-400">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-pink-600 text-white py-6">
    <div class="text-center">
        <p>&copy; 2024 Midsweet Creamery. Semua Hak Dilindungi.</p>
    </div>
</footer>

</body>
</html>
