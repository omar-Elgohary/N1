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
            'sub_category_id' => (int) $row[3],
            'product_image' => $row[4],
            'product_name' => $row[5],
            'description' => $row[6],
            'price' => $row[7],
            'size_id' => $row[8],
            'color_id' => $row[9],
            'returnable' => $row[10],
            'guarantee' => $row[11],
            'status' => $row[12],
            'branche_id' => $row[13],
            'quantity' => $row[14],
            'sold_quantity' => $row[15],
            'remaining_quantity' => $row[16],
        ]);
    }
}
