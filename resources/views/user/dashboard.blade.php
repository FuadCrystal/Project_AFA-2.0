<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body class="h-screen flex flex-col">

    <!-- Include the Navbar -->
    @include('partials.navbar')

    <div class="flex items-center justify-start flex-grow p-10">
        <div class="text-white">
            <h2 class="text-2xl font-bold mb-4">
                Pilihlah barang elektronik sesuai kebutuhan Anda
            </h2>
            <p class="mb-4">
                Kami akan memberikan rekomendasi alat elektronik terbaik untuk dimiliki.
            </p>
            <div class="relative inline-block text-left">
                <button onclick="toggleDropdown()" class="bg-white text-black px-4 py-2 rounded-full flex items-center">
                    user
                    <i class="fas fa-chevron-down ml-2"></i>
                </button>
                <div id="dropdownMenu" class="dropdown-menu origin-top-left absolute left-3 mt-1 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" style="top: 33px;">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdownButton">
                        <!-- Pilihan untuk menuju halaman user/dashboard -->
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('user.dashboard') }}" role="menuitem">
                            user nih
                        </a>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="#link2" role="menuitem">
                            Barang 2
                        </a>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="#link3" role="menuitem">
                            Barang 3
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('show');
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.closest('.relative')) {
                var dropdownMenu = document.getElementById('dropdownMenu');
                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.remove('show');
                }
            }
        }
    </script>

</body>
</html>
