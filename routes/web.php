<?php

use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', function () {
    return view('dashboard.index');
});


Route::get('/stock', function () {
    return view('stock.history');
});

Route::prefix('/supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('supplier');
});



Route::prefix('/product')->group(function () {
    Route::get("/", [ProductController::class, 'index'])->name('product');
    Route::get("/create", [ProductController::class, 'create'])->name('product.create');
    Route::get("/edit", [ProductController::class, 'show'])->name('product.edit');
});

Route::prefix('/category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
});
