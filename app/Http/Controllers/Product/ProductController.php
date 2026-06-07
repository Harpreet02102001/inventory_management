<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    //     $suppliers = Supplier::get();
    //     $categories = Category::get();
    //     $products = Product::with(['supplier', 'category'])->get();
    //     return view('product.products', compact('suppliers', 'categories', 'products'));
    // }
    public function index(Request $request)
    {
        $suppliers = Supplier::all();
        $categories = Category::all();

        $products = Product::with(['supplier', 'category'])

            ->when($request->search, function ($query, $search) {

                $query->where(function ($query) use ($search) {

                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%");
                });
            })

            ->when($request->category_id, function ($query, $categoryId) {

                $query->where('category_id', $categoryId);
            })

            ->when($request->supplier_id, function ($query, $supplierId) {

                $query->where('supplier_id', $supplierId);
            })

            ->when($request->status, function ($query, $status) {

                $query->where('status', $status);
            })

            ->when($request->stock === 'low', function ($query) {

                $query->where('stock_quantity', '<=', 10);
            })->latest()->paginate(10)->withQueryString();

        return view('product.products', compact('products', 'suppliers', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        $suppliers = Supplier::get();
        $categories = Category::get();
        return view('product.CreateProduct', compact('suppliers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all(), $request->file('image_url'));


        $validated = $request->validate([
            'name'           => 'required|min:2|max:100|unique:products,name',
            'sku'            => 'nullable|max:255',
            'category_id'    => 'required|exists:categories,id',
            'supplier_id'    => 'required|exists:suppliers,id',
            'price'          => 'required|numeric|min:0',
            'selling_price'  => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'image_url'      => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status'         => 'required|integer|in:1,2',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image_url')) {
                $validated['image_url'] = $request->file('image_url')->storeAs('products', 'ProductsImage' . time() . "." . $request->file('image_url')->getClientOriginalExtension(), 'public');
            }

            Product::create($validated);
            DB::commit();
            Alert::toast('Product created Successfully.', 'success');
            return redirect()->route('product');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::toast('An Error occured while creating the Product.', 'error');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    //display the details of a single product and update the stock quantity of the product
    public function show(string $id)
    {
        $product = Product::with(['supplier', 'category'])->findOrFail($id);
        return view('product.productStock', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with(['supplier', 'category'])->findOrFail($id);
        $suppliers = Supplier::get();
        $categories = Category::get();
        return view('product.updateProduct', compact('product', 'suppliers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'           => 'required|min:2|max:100|unique:products,name,' . $id,
            'sku'            => 'nullable|max:255',
            'category_id'    => 'required|exists:categories,id',
            'supplier_id'    => 'required|exists:suppliers,id',
            'price'          => 'required|numeric|min:0',
            'selling_price'  => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'image_url'      => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status'         => 'required|integer|in:1,2',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image_url')) {
                $validated['image_url'] = $request->file('image_url')->storeAs('products', 'ProductsImage' . time() . "." . $request->file('image_url')->getClientOriginalExtension(), 'public');
            }

            Product::findOrFail($id)->update($validated);
            DB::commit();
            Alert::toast('Product updated Successfully.', 'success');
            return redirect()->route('product');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::toast('An Error occured while updating the Product.', 'error');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $this->authorize('delete', $product);

            $product->delete();

            DB::commit();
            Alert::toast('Product deleted successfully.', 'success');
            return redirect()->route('product')->with('success', 'Product deleted successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::toast('An Error occured while deleting the Product.', 'error');
            return redirect()->route('product');
        }
    }
}
