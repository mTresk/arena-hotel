<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Rating extends Model
{
    public $fillable = ['rating', 'comment'];

    public function rateable(): MorphTo
    {
        return $this->morphTo();
    }

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
}
