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
            'category_id' => 3,
            'product_image' => '1686825194.jfif',
            'product_name' => 'تيشرت اطفالي',
            'description' => 'كولكشن تيشرت اطفالي',
            'price' => '220',
            'size_id' => 2,
            'color_id' => 5,
            'returnable' => 'نعم',
            'guarantee' => 'لا',
            'status' => 'متوفر',
            'branche_id' => 3,
            'quantity' => 80,
            'sold_quantity' => 20,
            'remaining_quantity' => 80 - 20,
        ]);

        ShopProduct::create([
            'random_id' => '#B7M3Z9',
            'department_id' => 2,
            'category_id' => 4,
            'product_image' => '1686825194.jfif',
            'product_name' => 'عباية',
            'description' => 'عبابات مستوردة',
            'price' => '390',
            'size_id' => 4,
            'color_id' => 3,
            'returnable' => 'نعم',
            'guarantee' => 'نعم',
            'status' => 'متوفر',
            'branche_id' => 4,
            'quantity' => 100,
            'sold_quantity' => 30,
            'remaining_quantity' => 100 - 30,
        ]);
    }
}
