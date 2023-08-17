<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'reservation_time' => 'datetime: H:i',
    ];

    private $locale = null;

    protected $hidden = ['quantity', 'remaining_quantity'];


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

    public function description(string $locale = null): Attribute {
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

    public function descriptionLocale(string $locale) {
        $this->locale = $locale;
        return $this->description;
    }


    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('Y-m-d'); // Adjust the format as needed
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function types()
    {
        return $this->hasone(ReservationType::class);
    }

    public function rates()
    {
        return $this->hasMany(EventRate::class);
    }

    public function likes() {
        return $this->hasMany(Like::class, 'likesable_id');
    }


    public function carts(){
        return $this->morphMany(Cart::class, "cartsable");
    }
}
