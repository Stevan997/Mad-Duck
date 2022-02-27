<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
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
                'name' => 'corner shop milos',
                'store_type_id' => 1
            ],
            [
                'name' => 'maxi',
                'store_type_id' => 2
            ],
            [
                'name' => 'lilly',
                'store_type_id' => 3
            ],
        ];

        foreach ($data as $value) {
            if(!Store::query()->where('name', $value['name'])->exists()) {
                Store::create($value);
            }
        }
    }
}
