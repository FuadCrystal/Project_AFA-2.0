<?php

namespace App\Http\Controllers;

use App\Models\Handphone;

class HandphoneController extends Controller
{
    // Method untuk user biasa
    public function index()
    {
        $handphones = Handphone::all();
        return view('Produk.handphone', compact('handphones'));
    }

    // Method untuk admin
    public function adminIndex()
    {
        $handphones = Handphone::all();
        return view('admin.handphones', compact('handphones'));
    }
}
