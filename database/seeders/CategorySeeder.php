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
        ]); // 1

        Category::create([
            'name' => 'بيتزا',
            'department_id' => 1,
        ]); // 2


        // Shop
        Category::create([
            'name' => 'اطفالي',
            'department_id' => 2,
        ]); // 3

        Category::create([
            'name' => 'حريمي',
            'department_id' => 2,
        ]); // 4

        Category::create([
            'name' => 'رجالي',
            'department_id' => 2,
        ]); // 5


        // Entertainment
        Category::create([
            'name' => 'ملاهي',
            'department_id' => 3,
        ]); // 6

        Category::create([
            'name' => 'سينما',
            'department_id' => 3,
        ]); // 7
    }
}
