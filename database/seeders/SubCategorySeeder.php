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
            'name' => 'وجبات كباب وكفتة',
            'category_id' => 1,
        ]);

        SubCategory::create([
            'name' => 'بيتزا رانش',
            'category_id' => 2,
        ]);

        SubCategory::create([
            'name' => 'مشروبات باردة',
            'category_id' => 3,
        ]);



        // Shop
        SubCategory::create([
            'name' => 'قمصان',
            'category_id' => 4,
        ]);

        SubCategory::create([
            'name' => 'كوتشيات',
            'category_id' => 5,
        ]);

        SubCategory::create([
            'name' => 'ترينجات بيتي',
            'category_id' => 6,
        ]);



        // Events
        SubCategory::create([
            'name' => 'ألعاب رعب',
            'category_id' => 7,
        ]);

        SubCategory::create([
            'name' => 'أفلام',
            'category_id' => 8,
        ]);

        SubCategory::create([
            'name' => 'كرة قدم',
            'category_id' => 9,
        ]);
    }
}
