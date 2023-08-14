<?php
namespace Database\Seeders;
use App\Models\RestaurentOrder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurentOrderSeeder extends Seeder
{
    public function run()
    {
        RestaurentOrder::create([
            'random_id' => '#D1F2T3',
            'user_id' => 2,
            'branche_id' => 1,
            'restaurent_product_id' => 1,
            'offer_id' => 1,
            'products_count' => 2,
            'total_price' => ((2 * 730) - (10 /100)),
        ]);

        RestaurentOrder::create([
            'random_id' => '#R7I8E2',
            'user_id' => 2,
            'branche_id' => 2,
            'restaurent_product_id' => 2,
            'products_count' => 3,
            'total_price' => 3 * 160,
        ]);

        RestaurentOrder::create([
            'random_id' => '#R7I8E2',
            'user_id' => 2,
            'branche_id' => 2,
            'restaurent_product_id' => 3,
            'products_count' => 3,
            'total_price' => 3 * 80,
        ]);
    }
}
