<?php

use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\ProductController;
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
