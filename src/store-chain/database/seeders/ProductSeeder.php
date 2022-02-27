<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'product_number' => 'HA8715PA',
                'name' => 'marlboro',
                'product_type_id' => 4,
                'store_id' => 1,
                'price' => 4.50,
                'quantity' => 20,
            ],
            [
                'product_number' => 'MT98711G',
                'name' => '1 hour parking ticket',
                'product_type_id' => 6,
                'store_id' => 1,
                'price' => 0.60,
                'quantity' => 1000,
            ],
            [
                'product_number' => 'PAGVA567741',
                'name' => 'Probiotic',
                'product_type_id' => 3,
                'store_id' => 3,
                'price' => 2.60,
                'quantity' => 35,
            ],
            [
                'product_number' => 'KKK569',
                'name' => 'fluffy bunny',
                'product_type_id' => 5,
                'store_id' => 3,
                'price' => 7.50,
                'quantity' => 5,
            ],
            [
                'product_number' => '9999151PP',
                'name' => 'bread',
                'product_type_id' => 1,
                'store_id' => 2,
                'price' => 0.50,
                'quantity' => 36,
            ],
            [
                'product_number' => 'UUUAHVA',
                'name' => 'water',
                'product_type_id' => 2,
                'store_id' => 2,
                'price' => 1.00,
                'quantity' => 70,
            ],
        ];

        foreach ($data as $value) {
            if(!Product::query()->where('product_number', $value['product_number'])->exists()) {
                Product::create($value);
            }
        }
    }
}
