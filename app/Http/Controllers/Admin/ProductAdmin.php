<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductAdmin extends Controller
{
    /**
     * Menampilkan daftar produk.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::with('category')->get(); // Ambil produk beserta kategori
        return view('admin.products.create', compact('products'));
    }

    /**
     * Halaman untuk membuat produk baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori untuk dropdown
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Menyimpan produk yang baru dibuat.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image', // Validasi gambar
            'price' => 'required|numeric', // Validasi harga
            'category_id' => 'required|exists:categories,id', // Validasi kategori
        ]);
    
        // Simpan produk
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id; // Simpan kategori
        $product->image = $request->file('image')->store('product_images', 'public');
        $product->save();
    
        // Redirect setelah produk berhasil ditambahkan
        return redirect()->route('admin.products.create')->with('success', 'Produk berhasil ditambahkan.');
    }
    
}
