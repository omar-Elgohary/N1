<?php
namespace App\Imports;
use App\Models\Event;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ImportEventProducts implements ToModel
{
    public function model(array $row)
    {
        // $date = new Carbon($row[9]);
        // dd($date->toDateTimeString());
        return new Event([
            'random_id' => (string) $row[0],
            'department_id' => (int) $row[1],
            'category_id' => (int) $row[2],
            'sub_category_id' => (int) $row[3],
            'event_image' => $row[4],
            'name' => [
                'en' => $row[5],
                'ar' => $row[6],
            ],
            'description' => [
                'en' => $row[7],
                'ar' => $row[8],
            ],            
            'ticket_price' => (int) $row[9],
            'reservations_type_id' => (int) $row[10],
            'status' => $row[11],
            'reservation_date' =>  date('Y-m-d H:i:s' , strtotime($row[12])),
            // 'reservation_time' => date('h:i:s', strtotime($row[13])),
            'reservation_time' => $row[13],
            'start_reservation_date' => date('Y-m-d H:i:s' , strtotime($row[14])),
            'tickets_quantity' => $row[15],
            'tickets_sold_quantity' => $row[16],
            'tickets_remaining_quantity' => $row[17],
        ]);
    }
}
