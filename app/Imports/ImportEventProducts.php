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
            'event_image' => $row[3],
            'event_name' => $row[4],
            'description' => $row[5],
            'ticket_price' => (int) $row[6],
            'reservations_type_id' => (int) $row[7],
            'status' => $row[8],
            'reservation_date' =>  date('Y-m-d H:i:s' , strtotime($row[9])),
            'reservation_time' => $row[10],
            'start_reservation_date' => date('Y-m-d H:i:s' , strtotime($row[11])),
            'tickets_quantity' => $row[12],
            'tickets_sold_quantity' => $row[13],
            'tickets_remaining_quantity' => $row[14],
        ]);
    }
}
