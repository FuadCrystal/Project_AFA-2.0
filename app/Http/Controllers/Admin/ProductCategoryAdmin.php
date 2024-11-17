<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;  // Pastikan model Category diimpor
use App\Models\Product; 
use Illuminate\Support\Str;
  // Pastikan model Product diimpor (jika diperlukan)

class ProductCategoryAdmin extends Controller
{
    

    protected $fillable = ['name', 'slug'];
    
    /**
     * Menampilkan daftar kategori produk dengan produk terkait.
     *
     * @return \Illuminate\View\View
     */
    public function index()
{
    // Mengambil semua kategori beserta produk yang terkait
    $kategori = Category::with('products')->get(); // Mengambil kategori beserta produk terkait

    // Mengirimkan variabel kategori ke view
    return view('admin.handphones', compact('kategori')); // Pastikan view yang dipanggil benar
}

    

// Category.php Model
public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    /**
     * Halaman untuk membuat kategori produk baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    

    /**
     * Menyimpan kategori produk yang baru dibuat.
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
    
        // Menyimpan data kategori produk
        $kategori = new Category();
        $kategori->name = $request->name;
        $kategori->slug = Str::slug($request->name); // Membuat slug otomatis
        $kategori->save();
    
        // Redirect ke halaman formulir kategori (bukan daftar kategori)
        return redirect()->route('admin.categories.create')->with('success', 'Kategori produk berhasil ditambahkan.');
    }
}    