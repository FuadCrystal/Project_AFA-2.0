<?php

namespace App\Http\Controllers;

use App\Models\Admin; // Import Admin model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 


class AdminController extends Controller
{
    // Constructor to apply authentication middleware for admin routes
    public function __construct()
    {
        $this->middleware('auth'); // Ensure only authenticated users can access admin routes
    }

    // Display a list of admins (you can modify this to show only admin users)
    public function index()
    {
        $admins = Admin::all(); // Get all admins
        return view('admin.dashboard', compact('admins')); // Pass admins to the view
    }

    // Show form to create a new admin
    public function create()
    {
        return view('admin.create'); // View with a form to add a new admin
    }

    // Store a new admin in the database
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'Fuad',
            'email' => 'Fuad@gmail.com',
            'password' => 'qazwsx123',
        ]);

        // Create a new admin
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password); // Encrypt the password
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan!');
    }
}
