<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurentProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('Y-m-d'); // Adjust the format as needed
    }

    public function Department()
    {
        return $this->belongsTo(Department::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function extras()
    {
        return $this->hasMany(Extra::class);
    }

    public function withouts()
    {
        return $this->hasMany(Without::class);
    }
}
