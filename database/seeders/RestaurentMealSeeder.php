<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\RestaurentProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurentMealSeeder extends Seeder
{
    public function run()
    {
        RestaurentProduct::create([
            'random_id' => '#DFSG48',
            'department_id' => 1,
            'category_id' => 1,
            'product_image' => '1686825194.jfif',
            'product_name' => 'كيلو مشوي مشكل',
            'description' => 'كيلو مشويات مشكل بسلطة وطحينة وارز',
            'price' => '650',
            'calories' => 360,
            'status' => 'متوفر',
            'extra_id' => 1,
            'without_id' => 3,
            'branche_id' => 1,
            'quantity' => 800,
            'sold_quantity' => 50,
            'remaining_quantity' => 800 - 50,
        ]);

        RestaurentProduct::create([
            'random_id' => '#G45D54',
            'department_id' => 1,
            'category_id' => 2,
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
