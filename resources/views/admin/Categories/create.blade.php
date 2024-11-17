<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="text-left mb-8">
            <h2 class="text-xl font-bold">Tambah Kategori</h2>
        </div>

        <!-- Form untuk menambahkan kategori -->
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Nama Kategori</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium">Slug</label>
                <input type="text" id="slug" name="slug" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Tambah Kategori</button>
            </div>
        </form>
    </div>
</x-app-layout>
