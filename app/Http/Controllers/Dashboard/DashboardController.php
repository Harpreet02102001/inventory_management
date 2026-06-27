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
    }
