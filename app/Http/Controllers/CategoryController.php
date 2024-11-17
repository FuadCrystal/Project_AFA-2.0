<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Fungsi untuk menampilkan form tambah kategori
    public function create()
    {
        return view('admin.categories.create');
    }

    // Fungsi untuk menyimpan kategori baru
    public function store(Request $request)
    {
        // Validasi input nama kategori
        $validated = $request->validate([
            'nama' => 'required|unique:categories,nama|max:255',
        ]);

        // Membuat slug dari nama kategori
        $slug = Str::slug($request->nama);

        // Menyimpan kategori dengan slug
        Category::create([
            'nama' => $request->nama,
            'slug' => $slug, // Simpan slug ke database
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }
}
