<!-- resources/views/admin/products/create.blade.php -->
<x-app-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-xl font-bold mb-4">Tambah Produk Baru</h2>

        <form action="{{ route('manager.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" id="name" name="name" class="w-full mt-1 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="text" id="price" name="price" class="w-full mt-1 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="specifications" class="block text-sm font-medium text-gray-700">Spesifikasi</label>
                <textarea id="specifications" name="specifications" class="w-full mt-1 border rounded-lg"></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                <input type="file" id="image" name="image" class="w-full mt-1 border rounded-lg">
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Simpan Produk</button>
            </div>
        </form>
    </div>
</x-app-layout>
