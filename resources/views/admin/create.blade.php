<x-app-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-xl font-bold">Tambah Admin</h2>

        <form action="{{ route('admin.store') }}" method="POST" class="mt-4">
            @csrf
            <div>
                <label for="name" class="block">Name</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mt-4">
                <label for="email" class="block">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mt-4">
                <label for="password" class="block">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="block">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Tambah Admin</button>
            </div>
        </form>
    </div>
</x-app-layout>
