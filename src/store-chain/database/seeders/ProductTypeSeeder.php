<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
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
                'name' => 'food',
            ],
            [
                'name' => 'drinks',
            ],
            [
                'name' => 'medicine',
            ],
            [
                'name' => 'cigarettes',
            ],
            [
                'name' => 'toys',
            ],
            [
                'name' => 'parking ticket',
            ],
        ];

        foreach ($data as $value) {
            if(!ProductType::query()->where('name', $value['name'])->exists()) {
                ProductType::create($value);
            }
        }
    }
}
