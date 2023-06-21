<?php
namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'random_id' => '#DFSG48',
            'category_id' => 1,
            'product_image' => '1686825194.jfif',
            'product_name' => 'عصير برتقال',
            'description' => 'عصير فريش منعش',
            'price' => '80',
            'calories' => 99,
            'status' => 'متوفر',
            'extra_id' =>  1,
            'without_id' => 3,
            'branche_id' => 1,
            'quantity' => 800,
            'sold_quantity' => 50,
            'remaining_quantity' => 800 - 50,
        ]);

        Product::create([
            'random_id' => '#G45D54',
            'category_id' => 3,
            'product_image' => '1686825194.jfif',
            'product_name' => 'بيتزا رانش',
            'description' => 'بيتزا اكسترا تشيكن رانش',
            'price' => '160',
            'calories' => 99,
            'status' => 'متوفر',
            'extra_id' =>  2,
            'without_id' => 4,
            'branche_id' => 2,
            'quantity' => 650,
            'sold_quantity' => 50,
            'remaining_quantity' => 650 - 50,
        ]);
    }
}
