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
            'name' => 'أسماك',
            'department_id' => 1,
        ]);

        Category::create([
            'name' => 'بيتزا',
            'department_id' => 1,
        ]);

        Category::create([
            'name' => 'مشروبات',
            'department_id' => 1,
        ]);
    }
}
