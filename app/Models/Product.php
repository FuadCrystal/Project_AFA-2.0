<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'slug', 
        'harga',
        'gambar', 
        'spesifikasi', 
        'category_id' // Kolom relasi ke kategori
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // Pastikan 'category_id' adalah FK yang benar
    }
}