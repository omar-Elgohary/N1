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

    public function categories()
    {
        return $this->hasMany(Category::class);
    }


    public function RestaurentProducts()
    {
        return $this->hasMany(RestaurentProduct::class);
    }
}
