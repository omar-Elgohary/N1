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

        Category::create([
            'name' => 'مشروبات',
            'department_id' => 1,
        ]); // 3



        // Shop
        Category::create([
            'name' => 'ملابس كاجوال',
            'department_id' => 2,
        ]); // 4

        Category::create([
            'name' => 'أحذية',
            'department_id' => 2,
        ]); // 5

        Category::create([
            'name' => 'ملابس بيتي',
            'department_id' => 2,
        ]); // 6



        // Entertainment
        Category::create([
            'name' => 'ملاهي',
            'department_id' => 3,
        ]); // 7

        Category::create([
            'name' => 'سينما',
            'department_id' => 3,
        ]); // 8

        Category::create([
            'name' => 'ملاعب',
            'department_id' => 3,
        ]); // 9
    }
}
