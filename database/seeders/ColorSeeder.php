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
            'hex' => 'FF0000',
        ]);

        Color::create([
            'color' => ['en' => 'white', 'ar' => 'أبيض'],
            'hex' => 'FFFFFF',
        ]);

        Color::create([
            'color' => ['en' => 'black', 'ar' => 'أسود'],
            'hex' => '000000',
        ]);

        Color::create([
            'color' => ['en' => 'brown', 'ar' => 'بني'],
            'hex' => 'A52A2A',
        ]);

        Color::create([
            'color' => ['en' => 'gray', 'ar' => 'رصاصي'],
            'hex' => '808080',
        ]);

        Color::create([
            'color' => ['en' => 'blue', 'ar' => 'أزرق'],
            'hex' => '87CEEB',
        ]);

        Color::create([
            'color' => ['en' => 'orange', 'ar' => 'برتقالي'],
            'hex' => 'FFA500',
        ]);

        Color::create([
            'color' => ['en' => 'green', 'ar' => 'أخضر'],
            'hex' => '008000',
        ]);
    }
}
