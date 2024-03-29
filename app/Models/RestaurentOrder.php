<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurentOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['branche_id', 'repeat_count'];

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('Y-m-d'); // Adjust the format as needed
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function branche()
    {
        return $this->belongsTo(Branch::class);
    }

    public function product()
    {
        return $this->hasOne(RestaurentProduct::class);
    }

    public function purchase()
    {
        return $this->hasOne(RestaurentPurchase::class);
    }
}
