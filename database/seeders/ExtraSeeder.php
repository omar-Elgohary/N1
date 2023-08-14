<?php
namespace Database\Seeders;
use App\Models\Extra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtraSeeder extends Seeder
{
    public function run()
    {
        Extra::create([
            'name' => ['en' => 'tomatos', 'ar' => 'دبل'],
            'price' => 15,
        ]);
        
        Extra::create([
            'name' => ['en' => 'sauce', 'ar' => 'صوص'],
            'price' => 2,
        ]);

        Extra::create([
            'name' => ['en' => 'potatoes', 'ar' => 'بطاطس'],
            'price' => 3,
        ]);

        Extra::create([
            'name' => ['en' => 'cheese', 'ar' => 'جبن'],
            'price' => 2,
        ]);

        Extra::create([
            'name' => ['en' => 'cucumber', 'ar' => 'خيار'],
            'price' => 5,
        ]);

        Extra::create([
            'name' => ['en' => 'ketchup', 'ar' => 'كاتشب'],
            'price' => 4,
        ]);

        Extra::create([
            'name' => ['en' => 'tomatos', 'ar' => 'طماطم'],
            'price' => 6,
        ]);

        Extra::create([
            'name' => ['en' => 'hot', 'ar' => 'حار'],
            'price' => 7,
        ]);
    }
}
