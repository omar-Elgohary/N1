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
        ]);

        Without::create([
            'name' => ['en' => 'tomatoes', 'ar' => 'طماطم'],
        ]);

        Without::create([
            'name' => ['en' => 'cheese', 'ar' => 'جبن'],
        ]);

        Without::create([
            'name' => ['en' => 'cucumber', 'ar' => 'خيار'],
        ]);

        Without::create([
            'name' => ['en' => 'ketchup', 'ar' => 'كاتشب'],
        ]);
    }
}
