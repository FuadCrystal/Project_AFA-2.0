<!-- resources/views/handphone.blade.php -->
<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="text-left mb-8">
            <h2 class="text-xl font-bold">Daftar Handphone</h2>
        </div>

        @if(auth()->check() && auth()->user()->type == 1)
            <!-- Tombol Tambah Produk untuk Admin -->
            <div class="text-left mb-8">
                <a href="{{ route('manager.products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg">
                    Tambah Produk
                </a>
            </div>
        @endif

        <div class="text-left mb-8">
            <h2 class="text-xl font-bold">Harga: Rp. 2.000.000 - Rp. 2.999.999</h2>
        </div>

        <div class="overflow-x-auto mb-8">
            <div class="flex space-x-4">
                @foreach ($handphones as $handphone)
                    <div class="bg-white p-4 border rounded-lg card">
                        <img alt="{{ $handphone->nama }}" class="mx-auto mb-4 rounded-lg" height="200" src="{{ $handphone->gambar }}" width="200"/>
                        <h3 class="text-lg font-bold">{{ $handphone->nama }}</h3>
                        <p class="text-sm">{{ $handphone->spesifikasi }}</p>
                        <p class="text-red-500 font-bold">Harga: Rp{{ number_format($handphone->harga, 0, ',', '.') }}</p>
                        <button class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-lg">Spesifikasi</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
