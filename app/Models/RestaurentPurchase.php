<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurentPurchase extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function order()
    {
        return $this->belongsTo(RestaurentOrder::class);
    }


    public function products()
    {
        return $this->hasMany(RestaurentProduct::class);
    }
}
