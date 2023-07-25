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
            'name' => [
                'en' => $row[5],
                'ar' => $row[6],
            ],
            'description' => [
                'en' => $row[7],
                'ar' => $row[8],
            ],
            'price' => $row[9],
            'calories' => $row[10],
            'status' => $row[11],
            'extra_id' => (int) $row[12],
            'without_id' => (int) $row[13],
            'branche_id' => (int) $row[14],
            'quantity' => $row[15],
            'sold_quantity' => $row[16],
            'remaining_quantity' => $row[17],
        ]);
    }
}
