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
            'name' => 'mashwiat',
            'department_id' => 1,
        ]);

        Category::create([
            'name' => 'sea foods',
            'department_id' => 1,
        ]);

        Category::create([
            'name' => 'pizza',
            'department_id' => 1,
        ]);

        Category::create([
            'name' => 'drinks',
            'department_id' => 1,
        ]);
    }
}
