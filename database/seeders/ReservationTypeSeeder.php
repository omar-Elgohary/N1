<?php
namespace Database\Seeders;
use App\Models\ReservationType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationTypeSeeder extends Seeder
{
    public function run()
    {
        // Restaurents
        ReservationType::create([
            'name' => ['en' => 'inside', 'ar' => 'داخلية'],
            'department_id' => 1,
        ]);

        ReservationType::create([
            'name' => ['en' => 'outside', 'ar' => 'خارجية'],
            'department_id' => 1,
        ]);

        ReservationType::create([
            'name' => ['en' => 'suspended', 'ar' => 'معلقة'],
            'department_id' => 1,
        ]);


        // Events
        ReservationType::create([
            'name' => ['en' => 'children', 'ar' => 'أطفال'],
            'department_id' => 3,
        ]);

        ReservationType::create([
            'name' => ['en' => 'youths', 'ar' => 'شباب'],
            'department_id' => 3,
        ]);

        ReservationType::create([
            'name' => ['en' => 'family', 'ar' => 'عائلة'],
            'department_id' => 3,
        ]);

        ReservationType::create([
            'name' => ['en' => 'top visitors', 'ar' => 'كبار زوار'],
            'department_id' => 3,
        ]);
    }
}
