<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-pink-400 via-purple-500 to-blue-600 text-white font-sans">

  <!-- Header -->
  <header class="bg-white shadow-lg py-4">
    <nav class="container mx-auto flex justify-between items-center px-6">
      <a href="/" class="text-3xl font-semibold text-pink-600 hover:text-pink-400">Midsweet Creamery</a>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto py-16 px-6">
    <div class="text-center mb-12">
      <h1 class="text-5xl font-bold text-white mb-4">Edit Profil</h1>
      <p class="text-2xl text-white mb-8">Perbarui informasi akun Anda di Midsweet Creamery</p>
    </div>

    <!-- Profile Edit Form -->
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
      <form action="{{ route('profile.update') }}" method="POST" id="profile-form">
        @csrf
        <div class="mb-6">
          <label for="name" class="block text-xl font-semibold text-gray-700">Nama</label>
          <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full p-4 mt-2 border rounded-lg text-black bg-white">
          @error('name')
            <span class="text-red-500 text-sm">Nama wajib diisi</span>
          @enderror
        </div>

        <div class="mb-6">
          <label for="email" class="block text-xl font-semibold text-gray-700">Email</label>
          <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full p-4 mt-2 border rounded-lg text-black bg-white">
          @error('email')
            <span class="text-red-500 text-sm">Email wajib diisi</span>
          @enderror
        </div>

        <div class="mb-6">
          <label for="password" class="block text-xl font-semibold text-gray-700">Password</label>
          <input type="password" name="password" id="password" class="w-full p-4 mt-2 border rounded-lg text-black bg-white">
        </div>

        <div class="mb-6">
          <label for="password_confirmation" class="block text-xl font-semibold text-gray-700">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-4 mt-2 border rounded-lg text-black bg-white">
          <span id="password-warning" class="text-red-500 text-sm hidden">Konfirmasi password wajib diisi jika password diubah</span>
        </div>

        <div class="flex justify-between">
          <button type="button" id="cancel-btn" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-400">Batalkan Edit</button>
          <button type="submit" id="submit-btn" class="bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-500" disabled>Perbarui Profil</button>
        </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-pink-600 text-white py-4">
    <div class="text-center">
      <p>&copy; 2024 Midsweet Creamery. Semua Hak Dilindungi.</p>
    </div>
  </footer>

  <script>
    // Fungsi untuk memeriksa apakah password diubah
    function validateForm() {
      var password = document.getElementById('password').value;
      var passwordConfirmation = document.getElementById('password_confirmation').value;
      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;

      // Cek apakah password diisi, jika ya, konfirmasi password wajib diisi
      if (password && !passwordConfirmation) {
        document.getElementById('password-warning').classList.remove('hidden');
        document.getElementById('submit-btn').disabled = true;
        return false; // Jika password diubah tapi konfirmasi kosong, jangan kirim form
      } else {
        document.getElementById('password-warning').classList.add('hidden');
      }

      // Cek apakah setidaknya satu kolom diisi
      if (name || email || password) {
        document.getElementById('submit-btn').disabled = false;
        return true;
      } else {
        document.getElementById('submit-btn').disabled = true;
        return false;
      }
    }

    // Event listener untuk password dan konfirmasi password
    document.getElementById('password').addEventListener('input', function() {
      validateForm();
    });

    document.getElementById('password_confirmation').addEventListener('input', function() {
      validateForm();
    });

    // Event listener untuk name dan email
    document.getElementById('name').addEventListener('input', function() {
      validateForm();
    });

    document.getElementById('email').addEventListener('input', function() {
      validateForm();
    });

    // Tombol Batalkan Edit
    document.getElementById('cancel-btn').addEventListener('click', function() {
      window.location.href = '/profile'; // Mengarahkan kembali ke halaman profil
    });
  </script>

</body>

</html>
