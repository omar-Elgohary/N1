<?php
namespace Database\Seeders;
use App\Models\ShopOrder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShopOrderSeeder extends Seeder
{
    public function run()
    {
        ShopOrder::create([
            'random_id' => '#D1F2T3',
            'user_id' => 2,
            'department_id' => 2,
            'shop_product_id' => 1,
            'products_count' => 1,
            'total_price' => 1 * 220,
        ]);

        ShopOrder::create([
            'random_id' => '#R7I8E2',
            'user_id' => 2,
            'department_id' => 2,
            'shop_product_id' => 2,
            'products_count' => 2,
            'total_price' => 2 * 390,
        ]);
    }
}
