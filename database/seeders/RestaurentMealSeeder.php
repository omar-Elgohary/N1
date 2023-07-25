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
            'sub_category_id' => 1,
            'product_image' => '1686825194.jfif',
            'name' => ['en' => 'mshkl mashwey', 'ar' => 'مشوي مشكل'],
            'description' => ['en' => 'A kilo of grilled kebab and kofta mixed with salad, tahini and rice', 'ar' => 'كيلو مشويات كباب وكفتة مشكل بسلطة وطحينة وارز'],
            'price' => '730',
            'calories' => 460,
            'status' => 'متوفر',
            'extra_id' => 1,
            'without_id' => 3,
            'branche_id' => 1,
            'quantity' => 500,
            'remaining_quantity' => 500,
        ]);

        RestaurentProduct::create([
            'random_id' => '#G45D54',
            'department_id' => 1,
            'category_id' => 2,
            'sub_category_id' => 2,
            'product_image' => '1686825194.jfif',
            'name' => ['en' => 'ranch pizza', 'ar' => 'بيتزا رانش'],
            'description' => ['en' => 'Extra chicken ranch pizza', 'ar' => 'بيتزا اكسترا تشيكن رانش'],
            'price' => '160',
            'calories' => 99,
            'status' => 'غير متوفر',
            'extra_id' =>  2,
            'without_id' => 4,
            'branche_id' => 2,
            'quantity' => 350,
            'remaining_quantity' => 350,
        ]);

        RestaurentProduct::create([
            'random_id' => '#J7Y9O2',
            'department_id' => 1,
            'category_id' => 3,
            'sub_category_id' => 3,
            'product_image' => '1686825194.jfif',
            'name' => ['en' => 'mango juice', 'ar' => 'عصير مانجا'],
            'description' => ['en' => 'Fresh natural mango juice with lemon', 'ar' => 'عصير مانجا طبيعي فريش مع ليمون'],
            'price' => '80',
            'calories' => 99,
            'status' => 'متوفر',
            'branche_id' => 2,
            'quantity' => 230,
            'remaining_quantity' => 230,
        ]);
    }
}
