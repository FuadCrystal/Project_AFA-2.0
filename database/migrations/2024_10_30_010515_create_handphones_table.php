<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandphonesTable extends Migration
{
    public function up()
    {
        Schema::create('handphones', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama'); // Nama handphone
            $table->string('gambar'); // Gambar handphone
            $table->string('spesifikasi'); // Spesifikasi handphone
            $table->decimal('harga', 10, 2); // Harga handphone
            $table->unsignedBigInteger('category_id'); // Foreign key kategori
            $table->timestamps(); // Kolom created_at & updated_at

            // Menambahkan foreign key
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade'); // Hapus handphone jika kategori terkait dihapus
        });
    }

    public function down()
    {
        Schema::dropIfExists('handphones');
    }
}
