<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Midsweet Creamery</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-pink-400 via-purple-500 to-blue-600 text-white font-sans">

  <!-- Header -->
  <header class="bg-white shadow-lg py-4">
    <nav class="container mx-auto flex justify-between items-center px-6">
      <a href="/" class="text-3xl font-semibold text-pink-600 hover:text-pink-400">Midsweet Creamery</a>
      <div class="space-x-6 flex items-center">
        @auth
        <a href="/profile" class="text-lg text-pink-600 hover:text-pink-400">Profile</a>
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @csrf
          <button type="submit" class="text-lg text-pink-600 hover:text-pink-400">Logout</button>
        </form>
        @else
        <a href="{{ route('login.form') }}" class="text-lg text-pink-600 hover:text-pink-400">Masuk</a>
        <a href="{{ route('register') }}" class="text-lg text-pink-600 hover:text-pink-400">Daftar</a>
        @endauth
        <a href="/cart" class="text-lg text-pink-600 hover:text-pink-400">Keranjang</a>
      </div>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto py-16 px-6">
    <div class="text-center mb-12">
      <h1 class="text-5xl font-bold mb-4">Selamat Datang di Midsweet Creamery!</h1>
      <p class="text-2xl mb-8">Nikmati es krim dengan berbagai rasa yang lezat dan menyegarkan!</p>
    </div>

    <!-- Grid Produk -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">

      <!-- Cokelat Lezat -->
      <div class="w-full bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/chocolate.jpg') }}" alt="Cokelat Lezat" class="w-full h-48 object-cover rounded-t-lg mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Cokelat Lezat</h2>
        <p class="text-lg text-gray-700 mb-4">Es krim cokelat yang kaya dengan rasa fudge.</p>
        <form action="{{ route('order.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product" value="chocolate">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
        </form>
      </div>

      <!-- Mimpi Stroberi -->
      <div class="w-full bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/strawberry.jpg') }}" alt="Mimpi Stroberi" class="w-full h-48 object-cover rounded-t-lg mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Mimpi Stroberi</h2>
        <p class="text-lg text-gray-700 mb-4">Es krim stroberi segar dengan potongan buah asli.</p>
        <form action="{{ route('order.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product" value="strawberry">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
        </form>
      </div>

      <!-- Vanila Klasik -->
      <div class="w-full bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/vanilla.jpg') }}" alt="Vanila Klasik" class="w-full h-48 object-cover rounded-t-lg mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Vanila Klasik</h2>
        <p class="text-lg text-gray-700 mb-4">Vanila klasik dengan bintik-bintik kacang vanila asli.</p>
        <form action="{{ route('order.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product" value="vanilla">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
        </form>
      </div>

      <!-- Caramel Impian -->
      <div class="w-full bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/caramel.jpg') }}" alt="Caramel Impian" class="w-full h-48 object-cover rounded-t-lg mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Caramel Impian</h2>
        <p class="text-lg text-gray-700 mb-4">Es krim karamel lembut dengan sirup karamel gurih.</p>
        <form action="{{ route('order.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product" value="caramel">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
        </form>
      </div>

      <!-- Cokelat Mint Segar -->
      <div class="w-full bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/mint.jpg') }}" alt="Cokelat Mint Segar" class="w-full h-48 object-cover rounded-t-lg mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Mint Segar</h2>
        <p class="text-lg text-gray-700 mb-4">Es krim mint segar, menyegarkan dan harum.</p>
        <form action="{{ route('order.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product" value="mint">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
        </form>
      </div>

    </div>

    <!-- Baris kedua produk -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 mt-8">

      <!-- Krispi Kacang -->
      <div class="w-full bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/krispi.jpg') }}" alt="Krispi Kacang" class="w-full h-48 object-cover rounded-t-lg mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Krispi Kacang</h2>
        <p class="text-lg text-gray-700 mb-4">Es krim kacang panggang dengan keripik cokelat.</p>
        <form action="{{ route('order.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product" value="krispi">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
        </form>
      </div>

      <!-- Red Velvet Manis -->
      <div class="w-full bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/redvelvet.jpg') }}" alt="Red Velvet Manis" class="w-full h-48 object-cover rounded-t-lg mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Red Velvet Manis</h2>
        <p class="text-lg text-gray-700 mb-4">Es krim red velvet dengan lapisan selai.</p>
        <form action="{{ route('order.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product" value="redvelvet">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
        </form>
      </div>

      <!-- Mangga Surga -->
      <div class="w-full bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/mangga.jpg') }}" alt="Mangga Surga" class="w-full h-48 object-cover rounded-t-lg mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Mangga Surga</h2>
        <p class="text-lg text-gray-700 mb-4">Es krim mangga dengan potongan buah mangga asli.</p>
        <form action="{{ route('order.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product" value="mangga">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
        </form>
      </div>

      <!-- Coconut Breeze -->
      <div class="w-full bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/coconut.jpg') }}" alt="Coconut Breeze" class="w-full h-48 object-cover rounded-t-lg mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Coconut Breeze</h2>
        <p class="text-lg text-gray-700 mb-4">Es krim kelapa dengan potongan kelapa panggang.</p>
        <form action="{{ route('order.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product" value="coconut">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
        </form>
      </div>

      <!-- Tiramisu Delight -->
      <div class="w-full bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/tiramisu.jpg') }}" alt="Tiramisu Delight" class="w-full h-48 object-cover rounded-t-lg mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Tiramisu Delight</h2>
        <p class="text-lg text-gray-700 mb-4">Es krim tiramisu dengan lapisan kopi dan mascarpone.</p>
        <form action="{{ route('order.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product" value="tiramisu">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
        </form>
      </div>

    </div>

  </main>

  <!-- Footer -->
  <footer class="bg-pink-600 text-white py-4">
    <div class="text-center">
      <p>&copy; 2024 Midsweet Creamery. Semua Hak Dilindungi.</p>
    </div>
  </footer>

</body>

</html>
