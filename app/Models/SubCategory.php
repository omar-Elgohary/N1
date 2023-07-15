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
}
