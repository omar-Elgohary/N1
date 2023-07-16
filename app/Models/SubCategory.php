<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function findSubCatName($name)
    {
        return $this->where('name', $name)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    public function restProducts()
    {
        return $this->hasMany(RestaurentProduct::class);
    }

    public function shopProducts()
    {
        return $this->hasMany(ShopProduct::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
