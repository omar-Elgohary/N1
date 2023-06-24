<?php
namespace Database\Seeders;
use App\Models\Purchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    public function run()
    {
        Purchase::create([
            'random_id' => '#D1F2T3',
            'order_id' => 1,
        ]);

        Purchase::create([
            'random_id' => '#H1J9Y3',
            'order_id' => 2,
        ]);
    }
}
