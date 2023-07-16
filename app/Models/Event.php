<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('Y-m-d'); // Adjust the format as needed
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function types()
    {
        return $this->hasone(ReservationType::class);
    }
}
