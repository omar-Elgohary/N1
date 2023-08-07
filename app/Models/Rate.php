<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rate extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $with = ['shop_product'];

    public function restaurent_product()
    {
        return $this->belongsTo(RestaurentProduct::class);
    }

    public function shop_product()
    {
        return $this->belongsTo(ShopProduct::class);
    }

    public function event_product()
    {
        return $this->belongsTo(Event::class);
    }
}
