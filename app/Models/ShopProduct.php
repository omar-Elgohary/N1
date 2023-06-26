<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    // public function sizes()
    // {
    //     return $this->hasMany(Size::class);
    // }


    public function colors()
    {
        return $this->hasMany(Color::class);
    }
}
