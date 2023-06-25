<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurentProduct extends Model
{
    use HasFactory;

    protected $guarded = [];


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
