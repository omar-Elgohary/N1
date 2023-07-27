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
            'color' => ['en' => 'red', 'ar' => 'أحمر'],
        ]);

        Color::create([
            'color' => ['en' => 'white', 'ar' => 'أبيض'],
        ]);

        Color::create([
            'color' => ['en' => 'black', 'ar' => 'أسود'],
        ]);

        Color::create([
            'color' => ['en' => 'brown', 'ar' => 'بني'],
        ]);

        Color::create([
            'color' => ['en' => 'gray', 'ar' => 'رصاصي'],
        ]);

        Color::create([
            'color' => ['en' => 'blue', 'ar' => 'أزرق'],
        ]);
    }
}
