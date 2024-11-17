<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Models\Handphone;
use App\Models\Category;  // Ini yang perlu ditambahkan

class HandphoneAdmin extends Controller
{
 
 
    // Handphone.php Model
protected $fillable = ['nama', 'spesifikasi', 'gambar', 'harga']; // Pastikan atribut-atribut ini ada
 

    public function index()
{
    // Ambil data handphone dengan relasi kategori
    $handphones = Handphone::with('category')->get();
    return view('admin.handphones', compact('handphones'));
}

    // Handphone.php Model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    

    public function create()
    {
        return view('admin.handphones.create');
    }

    /**
     * Menyimpan handphone yang baru dibuat.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'spesifikasi' => 'required|string',
            'gambar' => 'required|image',
            'harga' => 'required|numeric',
        ]);

        // Menyimpan data handphone
        $handphone = new Handphone();
        $handphone->nama = $request->nama;
        $handphone->spesifikasi = $request->spesifikasi;
        $handphone->gambar = $request->file('gambar')->store('handphone_images', 'public');
        $handphone->harga = $request->harga;
        $handphone->save();

        return redirect()->route('admin.handphones.index')->with('success', 'Handphone berhasil ditambahkan.');
    }
}
