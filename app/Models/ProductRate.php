<?php
namespace App\Models;
use App\Models\ShopProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductRate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_product()
    {
        return $this->belongsTo(ShopProduct::class);
    }
}
