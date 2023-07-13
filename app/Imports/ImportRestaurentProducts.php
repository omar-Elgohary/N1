<?php
namespace App\Imports;
use App\Models\RestaurentProduct;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportRestaurentProducts implements ToModel
{
    public function model(array $row)
    {
        return new RestaurentProduct([
            'random_id' => (string) $row[0],
            'department_id' => (int) $row[1],
            'category_id' => (int) $row[2],
            'product_image' => $row[3],
            'product_name' => $row[4],
            'description' => $row[5],
            'price' => $row[6],
            'calories' => $row[7],
            'status' => $row[8],
            'extra_id' => (int) $row[9],
            'without_id' => (int) $row[10],
            'branche_id' => (int) $row[11],
            'quantity' => $row[12],
            'sold_quantity' => $row[13],
            'remaining_quantity' => $row[14],
        ]);
    }
}
