<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $productRepository;

    // __construct function to create
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

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
        $items =  $this->productRepository->getProducts($request->all());
        return view('product.products', compact('items', 'suppliers', 'categories'));
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
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            if ($request->hasFile('image_url')) {
                $validated['image_url'] = $request->file('image_url')->storeAs('products', 'ProductsImage' . time() . "." . $request->file('image_url')->getClientOriginalExtension(), 'public');
            }
            $this->productRepository->store($validated);
            DB::commit();
            Alert::toast('Product created Successfully.', 'success');
            return redirect()->route('product');
        } catch (\Throwable $th) {
            DB::rollBack();
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
    public function update(UpdateProductRequest $request, string $id)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $this->authorize('update', $product);

            if ($request->hasFile('image_url')) {
                $validated['image_url'] = $request
                    ->file('image_url')
                    ->storeAs('products', 'ProductsImage' . time() . "." . $request->file('image_url')->getClientOriginalExtension(), 'public');
            }

            // Product::findOrFail($id)->update($validated);
            $this->productRepository->update($product, $validated);

            DB::commit();

            Alert::toast('Product updated Successfully.', 'success');
            return redirect()->route('product');
        } catch (\Throwable $th) {
            DB::rollBack();
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

            // $product = Product::findOrFail($id);
            // $product->delete();
            $this->productRepository->destroy($product);

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
