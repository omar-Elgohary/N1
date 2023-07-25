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
            'name' =>['en' => 'mashwiat', 'ar' => 'مشويات'],
            'department_id' => 1,
        ]); // 1

        Category::create([
            'name' =>['en' => 'pizza', 'ar' => 'بيتزا'],
            'department_id' => 1,
        ]); // 2

        Category::create([
            'name' =>['en' => 'drinks', 'ar' => 'مشروبات'],
            'department_id' => 1,
        ]); // 3



        // Shop
        Category::create([
            'name' =>['en' => 'Casual clothes', 'ar' => 'ملابس كاجوال'],
            'department_id' => 2,
        ]); // 4

        Category::create([
            'name' =>['en' => 'shoes', 'ar' => 'أحذية'],
            'department_id' => 2,
        ]); // 5

        Category::create([
            'name' =>['en' => 'Home clothes', 'ar' => 'ملابس بيتي'],
            'department_id' => 2,
        ]); // 6



        // Entertainment
        Category::create([
            'name' =>['en' => 'malahey', 'ar' => 'ملاهي'],
            'department_id' => 3,
        ]); // 7

        Category::create([
            'name' =>['en' => 'Cinema', 'ar' => 'سينما'],
            'department_id' => 3,
        ]); // 8

        Category::create([
            'name' =>['en' => 'Playgrounds', 'ar' => 'ملاعب'],
            'department_id' => 3,
        ]); // 9
    }
}
