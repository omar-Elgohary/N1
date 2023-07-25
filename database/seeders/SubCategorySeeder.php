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
            'name' => ['en' => 'kbab and kofta meals', 'ar' => 'وجبات كباب وكفتة'],
            'category_id' => 1,
        ]);

        SubCategory::create([
            'name' => ['en' => 'Ranch Pizza', 'ar' => 'بيتزا رانش'],
            'category_id' => 2,
        ]);

        SubCategory::create([
            'name' => ['en' => 'cold drinks', 'ar' => 'مشروبات باردة'],
            'category_id' => 3,
        ]);



        // Shop
        SubCategory::create([
            'name' => ['en' => 'shirts', 'ar' => 'قمصان'],
            'category_id' => 4,
        ]);

        SubCategory::create([
            'name' => ['en' => 'Coaches', 'ar' => 'كوتشيات'],
            'category_id' => 5,
        ]);

        SubCategory::create([
            'name' => ['en' => 'Betty staggers', 'ar' => 'ترينجات بيتي'],
            'category_id' => 6,
        ]);



        // Events
        SubCategory::create([
            'name' => ['en' => 'Horror Games', 'ar' => 'ألعاب رعب'],
            'category_id' => 7,
        ]);

        SubCategory::create([
            'name' => ['en' => 'films', 'ar' => 'أفلام'],
            'category_id' => 8,
        ]);

        SubCategory::create([
            'name' => ['en' => 'football', 'ar' => 'كرة قدم'],
            'category_id' => 9,
        ]);
    }
}
