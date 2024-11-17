<!-- resources/views/partials/navbar.blade.php -->
<div class="bg-teal-500 p-2 flex items-center justify-between">
   <div class="flex items-center">
      <img src="{{ asset('images/AFA logo.png') }}" class="h-8 w-8 rounded-full" alt="Logo" />
      <span class="text-white text-xl font-bold ml-2">A<span class="text-red-500">F</span>A</span>
   </div>
   <div class="flex items-center space-x-3">
      <div class="relative">
         <input class="px-3 py-1 rounded-full border-2 border-black" placeholder="Search" type="text"/>
         <i class="fas fa-search absolute right-2 top-1/2 transform -translate-y-1/2 text-black"></i>
      </div>
      <button class="bg-white text-black px-3 py-1 rounded-full">Compare</button>
      <!-- Tambahkan Username dan Logout -->
      <div class="flex items-center space-x-2">
         <span class="text-white font-semibold">{{ Auth::user()->name }}</span> <!-- Menampilkan nama user yang sedang login -->
         <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-full">Logout</button>
         </form>
      </div>
   </div>
</div>

<div class="bg-gray-200 p-2 flex items-center">
   <button class="text-black mx-2" id="scroll-left"><i class="fas fa-chevron-left"></i></button>
   <div class="scroll-container flex-1 mx-2 overflow-x-auto scrollbar-hidden whitespace-nowrap">
      <div class="flex space-x-20">
         <a class="text-black" href="#">Smartphone</a>
         <a class="text-black" href="#">Tablet</a>
         <a class="text-black" href="#">Laptop</a>
         <a class="text-black" href="#">Blender</a>
         <a class="text-black" href="#">Mesin Cuci</a>
         <a class="text-black" href="#">TV</a>
         <a class="text-black" href="#">Kulkas</a>
         <a class="text-black" href="#">AC</a>
         <a class="text-black" href="#">Microwave</a>
         <a class="text-black" href="#">Oven</a>
         <a class="text-black" href="#">Vacuum Cleaner</a>
         <a class="text-black" href="#">Rice Cooker</a>
         <a class="text-black" href="#">Air Fryer</a>
         <a class="text-black" href="#">Coffee Maker</a>
      </div>
   </div>
   <button class="text-black mx-2" id="scroll-right"><i class="fas fa-chevron-right"></i></button>
</div>

<script>
   document.getElementById('scroll-left').addEventListener('click', function() {
      document.querySelector('.scroll-container').scrollBy({ left: -100, behavior: 'smooth' });
   });
   document.getElementById('scroll-right').addEventListener('click', function() {
      document.querySelector('.scroll-container').scrollBy({ left: 100, behavior: 'smooth' });
   });
</script>

<style>
   .scrollbar-hidden::-webkit-scrollbar {
      display: none; /* Menghilangkan scrollbar untuk Webkit */
   }
   .scroll-container {
      -ms-overflow-style: none; /* Menghilangkan scrollbar untuk Internet Explorer dan Edge */
      scrollbar-width: none; /* Menghilangkan scrollbar untuk Firefox */
   }
</style>
