<?php
namespace Database\Seeders;
use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    public function run()
    {
        Color::create([
            'color' => 'أحمر',
        ]);

        Color::create([
            'color' => 'أبيض',
        ]);

        Color::create([
            'color' => 'أسود',
        ]);

        Color::create([
            'color' => 'بني',
        ]);

        Color::create([
            'color' => 'رصاصي',
        ]);

        Color::create([
            'color' => 'أزرق',
        ]);
    }
}
