<?php

namespace App\Models;

use App\Http\Traits\Rateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;
    use Rateable;

    protected $fillable = ['username', 'review', 'room_id', 'is_published', 'created_at'];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function rating(): HasOne
    {
        return $this->hasOne(Rating::class, 'rateable_id');
    }
}
