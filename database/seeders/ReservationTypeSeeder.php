<?php
namespace Database\Seeders;
use App\Models\ReservationType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationTypeSeeder extends Seeder
{
    public function run()
    {
        ReservationType::create([
            'name' => ['en' => 'children', 'ar' => 'أطفال'],
        ]);

        ReservationType::create([
            'name' => ['en' => 'youths', 'ar' => 'شباب'],
        ]);

        ReservationType::create([
            'name' => ['en' => 'family', 'ar' => 'عائلة'],
        ]);

        ReservationType::create([
            'name' => ['en' => 'top visitors', 'ar' => 'كبار زوار'],
        ]);
    }
}
