<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\StockHistory;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminDashboard()
    {
        return view('dashboard.index    ', [

            'totalProducts' => Product::count(),

            'totalCategories' => Category::count(),

            'totalSuppliers' => Supplier::count(),

            'lowStockCount' => Product::where('stock_quantity', '<=', 10)->count(),

            'recentStockCount' => StockHistory::whereDate('created_at', today())->count(),

            'lowStockProducts' => Product::with('category')->where('stock_quantity', '<=', 10)->take(5)->get(),

            'recentStockUpdates' => StockHistory::with(['product', 'user'])->latest()->take(5)->get(),
        ]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
