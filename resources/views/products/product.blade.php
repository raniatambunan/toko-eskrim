<form action="{{ route('order.add') }}" method="POST">
    @csrf
    <input type="hidden" name="product" value="chocolate">
    <input type="hidden" name="name" value="Coklat Lezat">
    <input type="hidden" name="price" value="25000">
    <button type="submit" class="mt-4 inline-block bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-400">Tambah ke Keranjang</button>
</form>
