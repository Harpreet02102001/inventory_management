<?php

use App\Http\Controllers\Supplier\SupplierController;
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

