<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
{
    DB::table('categories')->insert([
        [
            'nama' => 'Smartphone',  // Ganti name menjadi nama
            'slug' => 'smartphone',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'Laptop',
            'slug' => 'laptop',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}

}
