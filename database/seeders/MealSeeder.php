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
            'name' => ['en' => 'meat', 'ar' => 'لحمة'],
        ]);

        Meal::create([
            'name' => ['en' => 'fried chicken', 'ar' => 'فرايد اتشيكين'],
        ]);

        Meal::create([
            'name' => ['en' => 'koshary', 'ar' => 'كشري'],
        ]);

        Meal::create([
            'name' => ['en' => 'rice', 'ar' => 'أرز'],
        ]);

        Meal::create([
            'name' => ['en' => 'kofta', 'ar' => 'كفته'],
        ]);

        Meal::create([
            'name' => ['en' => 'shawerma', 'ar' => 'شاورما'],
        ]);
    }
}
