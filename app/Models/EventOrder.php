<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOrder extends Model
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

    public function Event()
    {
        return $this->belongsTo(Event::class);
    }

    public function purchase()
    {
        return $this->hasOne(EventPurchase::class);
    }
}
