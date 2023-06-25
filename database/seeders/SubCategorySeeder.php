<?php
namespace Database\Seeders;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        // Shops
        SubCategory::create([
            'name' => 'كباب',
            'category_id' => 1,
        ]);

        SubCategory::create([
            'name' => 'بيتزا رانش',
            'category_id' => 3,
        ]);

        // Restaurents
        SubCategory::create([
            'name' => 'تيشرتات اطفالي',
            'category_id' => 3,
        ]);

        SubCategory::create([
            'name' => 'عبابات خروج',
            'category_id' => 4,
        ]);
    }
}
