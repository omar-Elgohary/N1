<?php
namespace App\Imports;
use App\Models\ShopProduct;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportShopProducts implements ToModel
{
    public function model(array $row)
    {
        return new ShopProduct([
            'random_id' => (string) $row[0],
            'department_id' => (int) $row[1],
            'category_id' => (int) $row[2],
            'product_image' => $row[3],
            'product_name' => $row[4],
            'description' => $row[5],
            'price' => $row[6],
            'size_id' => $row[7],
            'color_id' => $row[8],
            'returnable' => $row[9],
            'guarantee' => $row[10],
            'status' => $row[11],
            'branche_id' => $row[12],
            'quantity' => $row[13],
            'sold_quantity' => $row[14],
            'remaining_quantity' => $row[15],
        ]);
    }
}
