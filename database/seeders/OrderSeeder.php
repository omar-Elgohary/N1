<?php
namespace Database\Seeders;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'random_id' => '#D1F2T3',
            'user_id' => 2,
            'department_id' => 1,
            'restaurent_product_id' => 1,
            'products_count' => 3,
            'total_price' => 5 * 80,
        ]);

        Order::create([
            'random_id' => '#R7I8E2',
            'user_id' => 2,
            'department_id' => 1,
            'restaurent_product_id' => 2,
            'products_count' => 5,
            'total_price' => 3 * 160,
        ]);
    }
}
