<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama produk
            $table->decimal('price', 10, 2); // Harga produk
            $table->string('image'); // Gambar produk
            $table->unsignedBigInteger('category_id'); // Foreign key kategori
            $table->timestamps(); // Kolom created_at & updated_at

            // Menambahkan foreign key
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade'); // Hapus produk jika kategori terkait dihapus
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
