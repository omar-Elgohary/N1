<?php
namespace App\Models;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
