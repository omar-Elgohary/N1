<?php
namespace Database\Seeders;
use App\Models\EventOrder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventOrderSeeder extends Seeder
{
    public function run()
    {
        EventOrder::create([
            'random_id' => '#D1F2T3',
            'user_id' => 2,
            'department_id' => 3,
            'branche_id' => 6,
            'category_id' => 7,
            'event_id' => 1,
            'reservations_type_id' => 1,
            'tickets_count' => 2,
            'total_price' => 2 * 90,
            'reservation_date' => '2023-08-30',
            'reservation_time' => '09:00',
        ]);

        EventOrder::create([
            'random_id' => '#R7I8E2',
            'user_id' => 2,
            'department_id' => 3,
            'branche_id' => 5,
            'category_id' => 8,
            'event_id' => 2,
            'reservations_type_id' => 2,
            'tickets_count' => 3,
            'total_price' => 3 * 135,
            'reservation_date' => '2023-09-10',
            'reservation_time' => '12:00',
        ]);
    }
}
