<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPurchase extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('Y-m-d'); // Adjust the format as needed
    }

    public function order()
    {
        return $this->belongsTo(EventOrder::class);
    }


    public function products()
    {
        return $this->hasMany(Event::class);
    }
}
