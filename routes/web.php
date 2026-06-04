<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Stock\StockController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/index', function () {
    return view('welcome');
});



Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });
});

Route::prefix('/user')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
});


Route::get('/stock', function () {});

Route::prefix('/supplier')->middleware('auth')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('supplier');
    Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::get('/{id}', [SupplierController::class, 'show'])->name('supplier.show');
    Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/{id}/update', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/{id}/destroy', [SupplierController::class, 'destroy'])->name('supplier.destroy');
});



Route::prefix('/product')->middleware('auth')->group(function () {
    Route::get("/", [ProductController::class, 'index'])->name('product');  //to show all the products
    Route::get("/create", [ProductController::class, 'create'])->name('product.create'); //show the form to add new resouce
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');  //to save a record into DB
    Route::get("/{id}/edit", [ProductController::class, 'edit'])->name('product.edit');      // to show the form to edit the record
    Route::get('{id}/show', [ProductController::class, 'show'])->name('product.show');   // show to show the details of a single resource
    Route::put("/{id}/update", [ProductController::class, 'update'])->name('product.update');  // to update the record into database
    Route::delete("/{id}/destroy", [ProductController::class, 'destroy'])->name('product.destroy');  // to delete the record from database
});

Route::prefix('/categories')->middleware('auth')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');   //show the form to create new categories
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');     //store data into database
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');              //show form to edit the categories
    Route::put('/{id}/update', [CategoryController::class, 'update'])->name('categories.update');        //store updated data into database
    Route::delete('/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');  //to delete the category 
});


Route::prefix('/stock')->middleware('auth')->group(function () {
    Route::get('/', [StockController::class, 'index'])->name('stock');
    Route::get('/create', [StockController::class, 'create'])->name('stock.create');
    Route::get('/viewData', [StockController::class, 'viewData'])->name('stock.view');
    Route::post('/store', [StockController::class, 'store'])->name('stock.store');
    Route::get('/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
    Route::put('/{id}/update', [StockController::class, 'update'])->name('stock.update');
    Route::delete('/{id}/destroy', [StockController::class, 'destroy'])->name('stock.destroy');
});


Route::prefix('/login')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
