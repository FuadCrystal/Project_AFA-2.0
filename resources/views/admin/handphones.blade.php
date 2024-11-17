<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="text-left mb-8">
            <h2 class="text-xl font-bold">Daftar Handphone</h2>
        </div>

        <!-- Tombol Tambah Produk -->
        <div class="text-left mb-8">
            <a href="{{ route('admin.products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg">
                Tambah Produk
            </a>
        </div>

        <!-- Tombol Tambah Kategori -->
        <div class="text-left mb-8">
            <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                Tambah Kategori
            </a>
        </div>

        <!-- Daftar Kategori dan Produk -->
        @foreach ($kategori as $category) <!-- Menggunakan $categories yang dikirim dari controller -->
            <div class="mb-8">
                <h3 class="text-xl font-bold mb-4">{{ $category->name }}</h3>

                @if ($category->products->isEmpty())
                    <p>Tidak ada produk untuk kategori ini.</p>
                @else
                    <!-- Menampilkan produk berdasarkan kategori -->
                    <div class="flex space-x-4">
                        @foreach ($category->products as $product) <!-- Menggunakan $category->products -->
                            <div class="bg-white p-4 border rounded-lg card">
                                <img alt="{{ $product->name }}" class="mx-auto mb-4 rounded-lg" height="200" src="{{ asset('storage/' . $product->image) }}" width="200"/>
                                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                                <p class="text-sm">{{ $product->description }}</p>
                                <p class="text-red-500 font-bold">Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                <button class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-lg">Spesifikasi</button>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
