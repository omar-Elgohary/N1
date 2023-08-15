<?php
namespace App\Models;
use App\Models\RestaurentProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MealRate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function meal_product()
    {
        return $this->belongsTo(RestaurentProduct::class);
    }
}
