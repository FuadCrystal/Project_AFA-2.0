<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryAdmin extends Controller
{
    /**
     * Menampilkan daftar kategori.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Halaman untuk membuat kategori baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Menyimpan kategori baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Menyimpan kategori
    $category = new Category();
    $category->name = $request->name;
    
    // Membuat slug otomatis berdasarkan nama
    $category->slug = Str::slug($request->name);
    $category->save();

    // Redirect setelah kategori berhasil ditambahkan
    return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
}

}
