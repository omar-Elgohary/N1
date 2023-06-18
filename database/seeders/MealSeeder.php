<?php
namespace Database\Seeders;
use App\Models\Meal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealSeeder extends Seeder
{
    public function run()
    {
        Meal::create([
            'name' => 'meat',
        ]);

        Meal::create([
            'name' => 'fried chicken',
        ]);

        Meal::create([
            'name' => 'koshary',
        ]);

        Meal::create([
            'name' => 'rice',
        ]);

        Meal::create([
            'name' => 'kofta',
        ]);

        Meal::create([
            'name' => 'shawerma',
        ]);
    }
}
