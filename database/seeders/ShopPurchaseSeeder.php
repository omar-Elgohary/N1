<?php
namespace Database\Seeders;
use App\Models\ShopPurchase;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShopPurchaseSeeder extends Seeder
{
    public function run()
    {
        ShopPurchase::create([
            'random_id' => '#D1F2T3',
            'shop_order_id' => 1,
        ]);

        ShopPurchase::create([
            'random_id' => '#H1J9Y3',
            'shop_order_id' => 2,
        ]);
    }
}
