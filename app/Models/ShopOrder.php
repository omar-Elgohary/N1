<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('Y-m-d'); // Adjust the format as needed
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(ShopProduct::class);
    }

    public function purchase()
    {
        return $this->hasOne(ShopPurchase::class);
    }

    public function sizes()
    {
        $ids = explode(',', $this->size_id);
        return Size::select('size')->whereIn('id', $ids)->get();
    }

    public function colors()
    {
        $ids = explode(',', $this->color_id);
        return Color::select('color', 'hex')->whereIn('id', $ids)->get();
    }
}
