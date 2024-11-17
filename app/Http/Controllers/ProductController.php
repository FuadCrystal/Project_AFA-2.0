<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Method to show the form for creating a new product
    public function create()
    {
        return view('admin.products.create'); // Your create product form view
    }

    // Method to store the new product in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'specifications' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
        ]);

        // Logic to store product details
        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->specifications = $validated['specifications'];
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('product_images', 'public');
        }
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }
}
