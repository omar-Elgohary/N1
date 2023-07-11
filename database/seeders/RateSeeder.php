<?php
namespace Database\Seeders;
use App\Models\Rate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RateSeeder extends Seeder
{
    public function run()
    {
        Rate::create([
            'department_id' => 1,
            'restaurent_product_id' => 1,
            'rate' => 3.4,
        ]);

        Rate::create([
            'department_id' => 1,
            'restaurent_product_id' => 1,
            'rate' => 4.5,
        ]);

        Rate::create([
            'department_id' => 1,
            'restaurent_product_id' => 2,
            'rate' => 2.8,
        ]);

        Rate::create([
            'department_id' => 1,
            'restaurent_product_id' => 2,
            'rate' => 4.5,
        ]);

        Rate::create([
            'department_id' => 2,
            'shop_product_id' => 2,
            'rate' => 4,
        ]);

        Rate::create([
            'department_id' => 2,
            'shop_product_id' => 1,
            'rate' => 2.8,
        ]);

        Rate::create([
            'department_id' => 3,
            'event_product_id' => 1,
            'rate' => 4,
        ]);

        Rate::create([
            'department_id' => 3,
            'event_product_id' => 2,
            'rate' => 4.7,
        ]);
    }
}
