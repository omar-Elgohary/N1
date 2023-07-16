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
            'event_name' => $row[5],
            'description' => $row[6],
            'ticket_price' => (int) $row[7],
            'reservations_type_id' => (int) $row[8],
            'status' => $row[9],
            'reservation_date' =>  date('Y-m-d H:i:s' , strtotime($row[10])),
            'reservation_time' => $row[11],
            'start_reservation_date' => date('Y-m-d H:i:s' , strtotime($row[12])),
            'tickets_quantity' => $row[13],
            'tickets_sold_quantity' => $row[14],
            'tickets_remaining_quantity' => $row[15],
        ]);
    }
}
