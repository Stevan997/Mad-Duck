<?php

namespace Database\Seeders;

use App\Models\ProductType;
use App\Models\StoreType;
use Illuminate\Database\Seeder;

class StoreTypeSeeder extends Seeder
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
                'name' => 'corner shop',
            ],
            [
                'name' => 'supermarket',
            ],
            [
                'name' => 'pharmacy',
            ],
        ];

        foreach ($data as $value) {
            if(!StoreType::query()->where('name', $value['name'])->exists()) {
                StoreType::create($value);
            }
        }
    }
}
