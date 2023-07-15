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
            'category_id' => 4,
            'product_image' => '1686825194.jfif',
            'product_name' => 'قميص بلاستر',
            'description' => 'قميص بلاستر كاجوال بدلة وخروج',
            'price' => '360',
            'size_id' => 2,
            'color_id' => 5,
            'returnable' => 'نعم',
            'guarantee' => 'لا',
            'status' => 'متوفر',
            'branche_id' => 3,
            'quantity' => 95,
            'sold_quantity' => 33,
            'remaining_quantity' => 95 - 33,
        ]);

        ShopProduct::create([
            'random_id' => '#B7M3Z9',
            'department_id' => 2,
            'category_id' => 5,
            'product_image' => '1686825194.jfif',
            'product_name' => 'كوتشي رانينج',
            'description' => 'كوتشي رانينج طبي مريح',
            'price' => '470',
            'size_id' => 4,
            'color_id' => 3,
            'returnable' => 'نعم',
            'guarantee' => 'نعم',
            'status' => 'غير متوفر',
            'branche_id' => 4,
            'quantity' => 250,
            'sold_quantity' => 199,
            'remaining_quantity' => 250 - 199,
        ]);

        ShopProduct::create([
            'random_id' => '#B7M3Z9',
            'department_id' => 2,
            'category_id' => 6,
            'product_image' => '1686825194.jfif',
            'product_name' => 'عباية خروج رجالي',
            'description' => 'عباية خروج رجالي مريحة فالصلاة والمشي',
            'price' => '740',
            'size_id' => 4,
            'color_id' => 3,
            'returnable' => 'نعم',
            'guarantee' => 'نعم',
            'status' => 'متوفر',
            'branche_id' => 4,
            'quantity' => 600,
            'sold_quantity' => 485,
            'remaining_quantity' => 600 - 485,
        ]);
    }
}
