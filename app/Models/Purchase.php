<?php
namespace App\Models;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
