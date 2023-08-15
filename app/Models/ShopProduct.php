<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShopProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];

    protected $hidden = [
        'rates'
    ];

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

    public function sizes()
    {
        $ids = explode(',', $this->size_id);
        return Size::select('size')->whereIn('id', $ids)->get();
    }

    public function colors()
    {
        $ids = explode(',', $this->color_id);
        return Color::select('color', 'hex')->whereIn('id', $ids)->get();
    }


    public function rates()
    {
        return $this->hasMany(ProductRate::class);
    }


    public function branche()
    {
        return $this->belongsTo(Branch::class);
    }


    public function likes() {
        return $this->hasMany(Like::class, 'likesable_id');
    }


    public function getRateAttribute() {
        $rates = $this->rates;
        $count = $rates->count();
        $sum = 0;
        foreach ($rates as $rate) {
            $sum += $rate->rate;
        }

        if ($count == 0 || $sum == 0)
            return 0;
        else
            return round($sum/$count, 1);
    }
}
