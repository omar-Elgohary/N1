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
            'name' => 'كباب',
            'category_id' => 1,
        ]);

        SubCategory::create([
            'name' => 'بيتزا رانش',
            'category_id' => 3,
        ]);

        SubCategory::create([
            'name' => 'سمك مشوي',
            'category_id' => 2,
        ]);

        SubCategory::create([
            'name' => 'كولا',
            'category_id' => 4,
        ]);
    }
}
