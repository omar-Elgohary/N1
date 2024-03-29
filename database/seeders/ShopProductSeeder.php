<?php
namespace Database\Seeders;
use App\Models\ShopProduct;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShopProductSeeder extends Seeder
{
    public function run()
    {
        ShopProduct::create([
            'random_id' => '#T8W2K4',
            'department_id' => 2,
            'branche_id' => 3,
            'category_id' => 4,
            'sub_category_id' => 4,
            'product_image' => 'fgh.jpg',
            'name' => ['en' => 'Blaster shirt', 'ar' => 'قميص بلاستر'],
            'description' => ['en' => 'Casual plaster shirt, suit and go out', 'ar' => 'قميص بلاستر كاجوال بدلة وخروج'],
            'price' => '360',
            'size_id' => 2,
            'color_id' => 5,
            'returnable' => 'نعم',
            'guarantee' => 'لا',
            'status' => 'متوفر',
            'quantity' => 100,
            'sold_quantity' => 60,
            'remaining_quantity' => 40,
            'coupon_id' => 3,
        ]);

        ShopProduct::create([
            'random_id' => '#B7M3Z9',
            'department_id' => 2,
            'branche_id' => 4,
            'category_id' => 5,
            'sub_category_id' => 5,
            'product_image' => 'fgh.jpg',
            'name' => ['en' => 'Kochi Running', 'ar' => 'كوتشي رانينج'],
            'description' => ['en' => 'Kochi Running New Medical', 'ar' => 'كوتشي رانينج طبي مريح'],
            'price' => '470',
            'size_id' => 4,
            'color_id' => 3,
            'returnable' => 'نعم',
            'guarantee' => 'نعم',
            'status' => 'غير متوفر',
            'quantity' => 250,
            'sold_quantity' => 150,
            'remaining_quantity' => 100,
            'coupon_id' => 4,
        ]);

        ShopProduct::create([
            'random_id' => '#B7M3Z9',
            'department_id' => 2,
            'branche_id' => 4,
            'category_id' => 6,
            'sub_category_id' => 6,
            'product_image' => 'fgh.jpg',
            'name' => ['en' => 'Tring Betty', 'ar' => 'ترينج بيتي'],
            'description' => ['en' => 'Comfortable baby clothes', 'ar' => 'ترينج اطفالي بيتي مريح'],
            'price' => '740',
            'size_id' => 4,
            'color_id' => 3,
            'returnable' => 'نعم',
            'guarantee' => 'نعم',
            'status' => 'متوفر',
            'quantity' => 600,
            'sold_quantity' => 450,
            'remaining_quantity' => 150,
        ]);
    }
}
