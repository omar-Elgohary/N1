<?php
namespace Database\Seeders;
use App\Models\MealRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealRateSeeder extends Seeder
{
    public function run()
    {
        MealRate::create([
            'user_id' => 2,
            'restaurent_product_id' => 1,
            'rate' => 2.7
        ]);

        MealRate::create([
            'user_id' => 2,
            'restaurent_product_id' => 2,
            'rate' => 1.8
        ]);

        MealRate::create([
            'user_id' => 2,
            'restaurent_product_id' => 3,
            'rate' => 3
        ]);

        MealRate::create([
            'user_id' => 3,
            'restaurent_product_id' => 1,
            'rate' => 3.5
        ]);

        MealRate::create([
            'user_id' => 3,
            'restaurent_product_id' => 2,
            'rate' => 2.4
        ]);
    }
}
