<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [];


    private $locale = null;

    public function name(string $locale = null): Attribute {
        return Attribute::make(
            get: function ($value) {
                if ($this->locale) {
                    $loc = $this->locale;
                    $this->locale = null;
                    return json_decode($value, true)[$loc];
                }
                return json_decode($value, true)[app()->getLocale()];
            },
            set: fn ($value) => json_encode($value)
        );
    }

    public function nameLocale(string $locale) {
        $this->locale = $locale;
        return $this->name;
    }



    public function products()
    {
        return $this->hasMany(ShopProduct::class);
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }




    public function scopeWithinRadius($query, $latitude, $longitude, $radius)
    {
        return $query->select("id", "name", "image", "branche_location", "latitude", "longitude")
            ->selectRaw("FORMAT(6371 * acos(
                cos(radians(?))
                * cos(radians(latitude))
                * cos(radians(longitude) - radians(?))
                + sin(radians(?))
                * sin(radians(latitude))
            ), 3) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->where("department_id", 1)->orderby('distance', 'asc');
    }
}
