<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Samsung Galaxy A37',
            'sku' => 'SKU-1001',
            'category_id' => 1,
            'supplier_id' => 1,
            'price' => 24500,
            'selling_price' => 26500,
            'stock_quantity' => 60,
            'image_url' => 'products.png',
        ]);
    }
}
