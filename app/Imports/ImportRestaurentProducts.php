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
            'sub_category_id' => (int) $row[3],
            'product_image' => $row[4],
            'product_name' => $row[5],
            'description' => $row[6],
            'price' => $row[7],
            'calories' => $row[8],
            'status' => $row[9],
            'extra_id' => (int) $row[10],
            'without_id' => (int) $row[11],
            'branche_id' => (int) $row[12],
            'quantity' => $row[13],
            'sold_quantity' => $row[14],
            'remaining_quantity' => $row[15],
        ]);
    }
}
