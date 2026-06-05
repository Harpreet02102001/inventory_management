<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StockHistory;

class StockHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $histories = [

            [
                'product_id' => 1,
                'user_id' => 1,
                'type' => 'IN',
                'old_quantity' => 0,
                'quantity_changed' => 0,
                'new_quantity' => 100,
                'remarks' => 'Initial stock added',
            ],



        ];

        foreach ($histories as $history) {

            StockHistory::create($history);
        }
    }
}
