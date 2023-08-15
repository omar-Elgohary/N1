<?php
namespace Database\Seeders;
use App\Models\ProductRate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductRateSeeder extends Seeder
{
    public function run()
    {
        ProductRate::create([
            'user_id' => 2,
            'shop_product_id' => 1,
            'rate' => 2.7
        ]);

        ProductRate::create([
            'user_id' => 2,
            'shop_product_id' => 2,
            'rate' => 1.8
        ]);

        ProductRate::create([
            'user_id' => 2,
            'shop_product_id' => 3,
            'rate' => 3
        ]);

        ProductRate::create([
            'user_id' => 3,
            'shop_product_id' => 1,
            'rate' => 3.5
        ]);

        ProductRate::create([
            'user_id' => 3,
            'shop_product_id' => 2,
            'rate' => 2.4
        ]);
    }
}
