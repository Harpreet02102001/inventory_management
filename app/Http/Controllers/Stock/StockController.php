<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\StockHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\StockHistoryRepository;
use App\Repositories\UserRepository;

class stockController extends Controller
{
    protected $repository;
    protected $userRepository;

    public function __construct(
        StockHistoryRepository $repository,
        UserRepository $userRepository
    ) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stockHistories = $this->repository->paginate($request);
        $users = $this->userRepository->get($request);

        return view('stock.stock_list', compact(
            'stockHistories',
            'users'
        ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.stock_list');
    }

    public function viewData()
    {
        $products = Product::with(['category', 'supplier'])->where('stock_quantity', '<=', 10)->paginate(10)->withQueryString();

        return view('stock.low_stock', compact('products'));
    }

    public function updateStock(Request $request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();

        $validated = $request->validate([
            'type' => 'required|in:IN,OUT,ADJUSTMENT',
            'quantity_changed' => 'required|integer|min:1',
            'remarks' => 'nullable|string|max:255',
        ]);


        $product = Product::findOrFail($id);

        $oldQuantity = $product->stock_quantity;

        if ($validated['type'] === 'IN') {

            $newQuantity = $oldQuantity + $validated['quantity_changed'];
        } else {

            if ($request->quantity_changed > $oldQuantity) {

                return back()->withErrors([
                    'quantity_changed' => 'Insufficient stock available.'
                ]);
            }

            $newQuantity = $oldQuantity - $validated['quantity_changed'];
        }
        try {
            // Update Product Stock
            $product->update([
                'stock_quantity' => $newQuantity
            ]);

            // Save History
            StockHistory::create([
                'product_id'       => $product->id,
                'user_id'          => Auth::user()->id,
                'type'             => $request->type,
                'old_quantity'     => $oldQuantity,
                'quantity_changed' => $request->quantity_changed,
                'new_quantity'     => $newQuantity,
                'remarks'          => $request->remarks,
            ]);

            DB::commit();
            Alert::toast('Stock updated successfully.', 'success');
            return redirect()->route('stock', $product->id)->with('success', 'Stock updated successfully.');
        } catch (\Exception $e) {

            DB::rollBack();
            Alert::toast('An Error occured while updating the stock.', 'error');
            return back()->with('error', $e->getMessage());
        }
    }
    /**
     * Store a newly created resource in storage.
     */
}
