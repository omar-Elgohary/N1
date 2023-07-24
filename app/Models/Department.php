<?php
namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function categories()
    {
        return $this->hasMany(Category::class);
    }


    public function RestaurentProducts()
    {
        return $this->hasMany(RestaurentProduct::class);
    }
}
