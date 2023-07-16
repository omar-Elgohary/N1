<?php
namespace Database\Seeders;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'random_id' => '#E1N2J3',
            'department_id' => 3,
            'category_id' => 7,
            'sub_category_id' => 7,
            'event_image' => '1687779997.jfif',
            'event_name' => 'قطر الموت',
            'description' => 'لعبة رعب قطر الموت 3 كيلو متر',
            'ticket_price' => '90',
            'reservations_type_id' => 2,

            'reservation_date' => '2023-07-20',
            'reservation_time' => '12:00',
            'start_reservation_date' => '2023-07-16',

            'tickets_quantity' => 200,
            'tickets_remaining_quantity' => 200,
        ]);


        Event::create([
            'random_id' => '#H5T2V0',
            'department_id' => 3,
            'category_id' => 8,
            'sub_category_id' => 8,
            'event_image' => '1687776590.jfif',
            'event_name' => 'فيلم كيره والجن',
            'description' => 'فيلم تاريخي بطولة كريم عبد العزيز وأحمد عز',
            'ticket_price' => '135',
            'reservations_type_id' => 4,

            'reservation_date' => '2023-07-08',
            'reservation_time' => '09:00',
            'start_reservation_date' => '2023-07-01',

            'tickets_quantity' => 500,
            'tickets_remaining_quantity' => 500,
        ]);


        Event::create([
            'random_id' => '#H5T2V0',
            'department_id' => 3,
            'category_id' => 9,
            'sub_category_id' => 9,
            'event_image' => '1687776590.jfif',
            'event_name' => 'ملعب كورة قدم',
            'description' => 'حجز ملعب كورة قدم كبير واقامة دورات',
            'ticket_price' => '200',
            'reservations_type_id' => 4,

            'reservation_date' => '2023-07-18',
            'reservation_time' => '09:00',
            'start_reservation_date' => '2023-07-01',

            'tickets_quantity' => 900,
            'tickets_remaining_quantity' => 900,
        ]);
    }
}
