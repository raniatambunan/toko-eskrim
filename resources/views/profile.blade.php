<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-pink-300 via-purple-400 to-blue-500 text-white font-sans h-screen">

  <!-- Header -->
  <header class="bg-white shadow-xl py-4">
    <nav class="container mx-auto flex justify-between items-center px-6">
      <a href="/" class="text-4xl font-bold text-pink-600 hover:text-pink-400 transition duration-300">Midsweet Creamery</a>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto flex flex-col items-center justify-center py-12 px-6 flex-1">
    <div class="text-center mb-6">
      <h1 class="text-5xl font-bold text-white mb-4">Profile Anda</h1>
      <p class="text-xl text-white mb-6">Halaman profile pengguna di Midsweet Creamery</p>
    </div>

    <!-- Profile Details Section -->
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-4xl mx-auto mb-6">
      <div class="flex items-center justify-center mb-6">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff&bold=true"
          alt="Avatar" class="w-32 h-32 rounded-full border-4 border-pink-500 shadow-md">
      </div>
      <div class="text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="text-lg text-gray-700 mb-4">Berikut adalah informasi akun Anda di Midsweet Creamery.</p>

        <!-- Display User Information -->
        <div class="mb-6">
          <p class="text-xl font-medium text-gray-700">Email: <span class="text-lg text-gray-500">{{ Auth::user()->email }}</span></p>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-center gap-6">
          <!-- Tombol Ubah Profile -->
          <a href="{{ route('profile.edit') }}" class="bg-pink-600 text-white py-2 px-6 rounded-lg hover:bg-pink-500 transition duration-300 transform hover:scale-105">
            Ubah Profile
          </a>
          <!-- Tombol Logout -->
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-red-600 text-white py-2 px-6 rounded-lg hover:bg-red-500 transition duration-300 transform hover:scale-105">
              Logout
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Kembali ke Halaman Utama Button -->
    <div class="text-center mt-6">
      <a href="/" class="bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-500 transition duration-300 transform hover:scale-105">
        Kembali ke Halaman Utama
      </a>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-pink-600 text-white py-4">
    <div class="text-center">
      <p class="text-lg">&copy; 2024 Midsweet Creamery. Semua Hak Dilindungi.</p>
    </div>
  </footer>

</body>

</html>
