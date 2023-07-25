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
            'name' => ['en' => 'sauce', 'ar' => 'صوص'],
        ]);

        Extra::create([
            'name' => ['en' => 'potatoes', 'ar' => 'بطاطس'],
        ]);

        Extra::create([
            'name' => ['en' => 'cheese', 'ar' => 'جبن'],
        ]);

        Extra::create([
            'name' => ['en' => 'cucumber', 'ar' => 'خيار'],
        ]);

        Extra::create([
            'name' => ['en' => 'ketchup', 'ar' => 'كاتشب'],
        ]);
    }
}
