<?php
namespace Database\Seeders;
use App\Models\Without;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WithoutSeeder extends Seeder
{
    public function run()
    {
        Without::create([
            'name' => ['en' => 'onion', 'ar' => 'بصل'],
            'price' => 4,
        ]);

        Without::create([
            'name' => ['en' => 'sauce', 'ar' => 'صوص'],
            'price' => 2,
        ]);

        Without::create([
            'name' => ['en' => 'potatoes', 'ar' => 'بطاطس'],
            'price' => 3,
        ]);

        Without::create([
            'name' => ['en' => 'cheese', 'ar' => 'جبن'],
            'price' => 2,
        ]);

        Without::create([
            'name' => ['en' => 'cucumber', 'ar' => 'خيار'],
            'price' => 5,
        ]);

        Without::create([
            'name' => ['en' => 'ketchup', 'ar' => 'كاتشب'],
            'price' => 4,
        ]);

        Without::create([
            'name' => ['en' => 'tomatos', 'ar' => 'طماطم'],
            'price' => 6,
        ]);
    }
}
