<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gradient-to-r from-pink-400 via-purple-500 to-blue-600 font-sans">

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
            <h2 class="text-3xl font-semibold text-center text-pink-600 mb-6">Daftar Akun</h2>

            <form action="{{ url('/register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nama</label>
                    <input type="text" name="name" id="name" required class="w-full p-2 mt-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="w-full p-2 mt-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>

                <!-- Password -->
                <div class="mb-4 relative">
                    <label for="password" class="block text-gray-700">Password</label>
                    <div class="flex items-center border border-gray-300 rounded focus-within:ring-2 focus-within:ring-pink-500">
                        <input type="password" name="password" id="password" required class="w-full p-2 mt-2 rounded-none focus:outline-none" placeholder="Masukkan password" />
                        <button type="button" id="toggle-password" class="px-3 py-2 text-gray-600 focus:outline-none">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Password Confirmation -->
                <div class="mb-4 relative">
                    <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password</label>
                    <div class="flex items-center border border-gray-300 rounded focus-within:ring-2 focus-within:ring-pink-500">
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full p-2 mt-2 rounded-none focus:outline-none" placeholder="Masukkan password" />
                        <button type="button" id="toggle-password-confirmation" class="px-3 py-2 text-gray-600 focus:outline-none">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full bg-pink-600 text-white p-2 rounded hover:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-500">
                        Daftar
                    </button>
                </div>
            </form>

            <!-- Link kembali ke halaman utama -->
            <div class="mt-4 text-center">
                <a href="{{ url('/') }}" class="text-pink-600 hover:text-pink-400">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            // Toggle icon
            if (type === 'password') {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });

        document.getElementById('toggle-password-confirmation').addEventListener('click', function() {
            const passwordConfirmationField = document.getElementById('password_confirmation');
            const icon = this.querySelector('i');
            const type = passwordConfirmationField.type === 'password' ? 'text' : 'password';
            passwordConfirmationField.type = type;

            // Toggle icon
            if (type === 'password') {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });

    </script>
  <!-- Footer -->
  <footer class="bg-pink-600 text-white py-4">
    <div class="text-center">
      <p>&copy; 2024 Midsweet Creamery. Semua Hak Dilindungi.</p>
    </div>
  </footer>

</body>
</html>
