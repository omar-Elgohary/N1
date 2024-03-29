<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['user'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
