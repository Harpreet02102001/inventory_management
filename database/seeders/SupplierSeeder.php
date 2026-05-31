<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'name' => 'LG Electronics',
            'email' => 'testing@gmail.com',
            'phone' => '7814557470',
            'Address' => 'Ludhiana',
        ]);
    }
}
