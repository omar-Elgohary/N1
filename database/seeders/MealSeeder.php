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
            'name' => 'لحمة',
        ]);

        Meal::create([
            'name' => 'فرايد اتشيكين',
        ]);

        Meal::create([
            'name' => 'كشري',
        ]);

        Meal::create([
            'name' => 'أرز',
        ]);

        Meal::create([
            'name' => 'كفته',
        ]);

        Meal::create([
            'name' => 'شاورما',
        ]);
    }
}
