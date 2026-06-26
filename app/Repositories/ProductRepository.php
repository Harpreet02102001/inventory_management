<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;

class ProductRepository
{
    //function to get the products the validated data from controller   
    public function getProducts(array $filters)
    {
        return Product::with(['supplier', 'category'])

            ->when(!empty($filters['search']), function ($query) use ($filters) {

                $search = $filters['search'];

                $query->where(function ($query) use ($search) {

                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%");
                });
            })

            ->when(!empty($filters['category_id']), function ($query) use ($filters) {

                $query->where(
                    'category_id',
                    $filters['category_id']
                );
            })

            ->when(!empty($filters['supplier_id']), function ($query) use ($filters) {

                $query->where(
                    'supplier_id',
                    $filters['supplier_id']
                );
            })

            ->when(isset($filters['status']) && $filters['status'] !== '', function ($query) use ($filters) {

                $query->where(
                    'status',
                    $filters['status']
                );
            })

            ->when(
                isset($filters['stock']) && $filters['stock'] === 'low',
                function ($query) {

                    $query->where('stock_quantity', '<=', 10);
                }
            )->latest()->paginate(10)->withQueryString();
    }

    //funtion to get a
    function getAll()
    {
        return Product::get();
    }

    //function to store data the validated data from controller
    function store(array $data)
    {
        return Product::create($data);
    }

    //function to update the data the validated data from the controller
    function update(Product $product, array $data)
    {
        $product->update($data);
        return $product;
    }

    //function to delete the data from DBwh
    function destroy(Product $product)
    {
        return $product->delete();
    }
}
