<?php

namespace App\Http\Traits;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Rateable
{
    public function rate($value, $comment = null): void
    {
        $rating = new Rating();
        $rating->rating = $value;
        $rating->comment = $comment;

        $this->ratings()->save($rating);
    }

    public function rateOnce($value, $comment = null): void
    {
        $rating = Rating::query()
            ->where('rateable_type', '=', $this->getMorphClass())
            ->where('rateable_id', '=', $this->id)
            ->first();

        if ($rating) {
            $rating->rating = $value;
            $rating->comment = $comment;
            $rating->save();
        } else {
            $this->rate($value, $comment);
        }
    }

    public function ratings(): MorphMany
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

    public function sumRating()
    {
        return $this->ratings()->sum('rating');
    }

    public function timesRated(): int
    {
        return $this->ratings()->count();
    }
}
