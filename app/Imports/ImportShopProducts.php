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
            'name' => [
                'en' => $row[5],
                'ar' => $row[6],
            ],
            'description' => [
                'en' => $row[7],
                'ar' => $row[8],
            ],
            'price' => $row[9],
            'size_id' => $row[10],
            'color_id' => $row[11],
            'returnable' => $row[12],
            'guarantee' => $row[13],
            'status' => $row[14],
            'branche_id' => $row[15],
            'quantity' => $row[16],
            'sold_quantity' => $row[17],
            'remaining_quantity' => $row[18],
        ]);
    }
}
