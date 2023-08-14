<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurentProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public $timestamps = false;

    protected $hidden = ['quantity', 'sold_quantity', 'remaining_quantity', 'created_at', 'updated_at'];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
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

    public function Department()
    {
        return $this->belongsTo(Department::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function extras()
    {
        $ids = explode(',', $this->extra_id);
        return Extra::select('id', 'name', 'price')->whereIn('id', $ids)->get();
    }

    public function withouts()
    {
        $ids = explode(',', $this->without_id);
        return Without::select('id', 'name')->whereIn('id', $ids)->get();
    }



    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function likes() {
        return $this->hasMany(Like::class, 'likesable_id');
    }
}

