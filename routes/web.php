<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HandphoneAdmin;
use App\Http\Controllers\Admin\ProductAdmin;
use App\Http\Controllers\Admin\ProductCategoryAdmin;
use App\Http\Controllers\HandphoneController as UserHandphoneController;
use App\Http\Controllers\ProductController as UserProductController;
use App\Http\Controllers\ProductCategoryController as UserProductCategoryController;
use App\Http\Middleware\RoleAuth;
use App\Models\Product;
use App\Http\Controllers\Admin\CategoryAdmin;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin');
});

Route::middleware(['auth', 'role:3'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// Admin routes for role 1 (Admin)
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin');


    Route::get('/admin/categories', [ProductCategoryAdmin::class, 'index'])->name('admin.categories.index'); // Daftar kategori
    Route::get('/admin/categories/create', [ProductCategoryAdmin::class, 'create'])->name('admin.categories.create'); // Formulir untuk membuat kategori
    Route::post('/admin/categories', [ProductCategoryAdmin::class, 'store'])->name('admin.categories.store'); // Menyimpan kategori
    Route::get('admin/handphones', [HandphoneAdmin::class, 'index'])->name('admin.handphones.index');
    Route::get('/admin/handphones/create', [HandphoneAdmin::class, 'create'])->name('admin.handphones.create');
    Route::post('/admin/handphones', [HandphoneAdmin::class, 'store'])->name('admin.handphones.store');
    Route::get('/admin/handphones/{handphone}/edit', [HandphoneAdmin::class, 'edit'])->name('admin.handphones.edit');
    Route::put('/admin/handphones/{handphone}', [HandphoneAdmin::class, 'update'])->name('admin.handphones.update');
    Route::delete('/admin/handphones/{handphone}', [HandphoneAdmin::class, 'destroy'])->name('admin.handphones.destroy');
    Route::resource('products', ProductAdmin::class);
    Route::resource('categories', CategoryAdmin::class);
    Route::get('/categories', [CategoryAdmin::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryAdmin::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryAdmin::class, 'store'])->name('categories.store');

    Route::get('/admin/products', [ProductAdmin::class, 'index'])->name('admin.products.index');
    Route::get('admin/products/create', [ProductAdmin::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductAdmin::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [ProductAdmin::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductAdmin::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductAdmin::class, 'destroy'])->name('admin.products.destroy');

    Route::get('/admin/categories', [ProductCategoryAdmin::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [ProductCategoryAdmin::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [ProductCategoryAdmin::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [ProductCategoryAdmin::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [ProductCategoryAdmin::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [ProductCategoryAdmin::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('admin/categories/create', [ProductCategoryAdmin::class, 'create'])->name('admin.categories.create');
});

// User routes (for viewing only)
Route::get('/products', [UserProductController::class, 'index'])->name('user.products.index');
Route::get('/handphones', [UserHandphoneController::class, 'index'])->name('user.handphones.index');
Route::get('/categories', [UserProductCategoryController::class, 'index'])->name('user.categories.index');
