<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\RestaurentPurchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurentPurchaseSeeder extends Seeder
{
    public function run()
    {
        RestaurentPurchase::create([
            'random_id' => '#D1F2T3',
            'restaurent_order_id' => 1,
        ]);

        RestaurentPurchase::create([
            'random_id' => '#H1J9Y3',
            'restaurent_order_id' => 2,
        ]);
    }
}
