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
            'name' => 'أطفال',
        ]);

        ReservationType::create([
            'name' => 'شباب',
        ]);

        ReservationType::create([
            'name' => 'عائلة',
        ]);

        ReservationType::create([
            'name' => 'كبار زوار',
        ]);
    }
}
