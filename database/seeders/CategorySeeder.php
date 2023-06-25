<?php
namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'مشويات',
            'department_id' => 1,
        ]);

        Category::create([
            'name' => 'بيتزا',
            'department_id' => 1,
        ]);


        // Shop
        Category::create([
            'name' => 'اطفالي',
            'department_id' => 2,
        ]);

        Category::create([
            'name' => 'حريمي',
            'department_id' => 2,
        ]);
    }
}
