<?php

use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
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
    Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::get('/{id}', [SupplierController::class, 'show'])->name('supplier.show');
    Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/{id}/update', [SupplierController::class, 'update'])->name('supplier.update');
    // Route::delete('/{id}/destroy', [SupplierController::class, 'destroy'])->name('supplier.destroy');
});



Route::prefix('/product')->group(function () {
    Route::get("/", [ProductController::class, 'index'])->name('product');
    Route::get("/create", [ProductController::class, 'create'])->name('product.create');
    Route::get("/edit", [ProductController::class, 'show'])->name('product.edit');
});

Route::prefix('/categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');   //show the form to create new categories
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');     //store data into database
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');              //show form to edit the categories
    Route::put('/{id}/update', [CategoryController::class, 'update'])->name('categories.update');        //store updated data into database
    Route::delete('/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');  //to delete the category 
});
