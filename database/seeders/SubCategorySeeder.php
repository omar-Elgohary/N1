<?php
namespace Database\Seeders;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        SubCategory::create([
            'name' => 'la7ma mashwia',
            'category_id' => 1,
        ]);

        SubCategory::create([
            'name' => 'pizza ransh',
            'category_id' => 3,
        ]);

        SubCategory::create([
            'name' => 'samak mashwey',
            'category_id' => 2,
        ]);

        SubCategory::create([
            'name' => 'cola',
            'category_id' => 4,
        ]);
    }
}
