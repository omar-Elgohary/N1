<?php
namespace Database\Seeders;
use App\Models\EventRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventRateSeeder extends Seeder
{
    public function run()
    {
        EventRate::create([
            'user_id' => 2,
            'event_id' => 1,
            'rate' => 2.7
        ]);

        EventRate::create([
            'user_id' => 2,
            'event_id' => 2,
            'rate' => 1.8
        ]);

        EventRate::create([
            'user_id' => 2,
            'event_id' => 3,
            'rate' => 3
        ]);

        EventRate::create([
            'user_id' => 3,
            'event_id' => 1,
            'rate' => 3.5
        ]);

        EventRate::create([
            'user_id' => 3,
            'event_id' => 2,
            'rate' => 2.4
        ]);
    }
}
