<?php
namespace App\Models;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventRate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event_product()
    {
        return $this->belongsTo(Event::class);
    }
}
