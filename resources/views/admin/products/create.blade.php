<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="text-left mb-8">
            <h2 class="text-xl font-bold">Tambah Produk</h2>
            <p class="mb-4">Silakan isi detail produk yang ingin Anda tambahkan.</p>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="description" name="description" class="mt-1 block w-full" required></textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="price" name="price" class="mt-1 block w-full" required>
            </div>

            <!-- Kategori Dropdown -->
    <div class="mb-4">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
        <select id="category_id" name="category_id" class="mt-1 block w-full" required>
    <option value="" disabled selected>Pilih Kategori</option>

    @foreach ($categories as $category) <!-- Ganti $kategori dengan $categories -->
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
    </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full" accept="image/*">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-2 rounded-lg">
        Simpan Produk
    </button>
</form>
</x-app-layout>
