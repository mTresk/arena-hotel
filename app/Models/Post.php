<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'slug', 'content', 'excerpt', 'published_at'];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published_at', '<=', now());
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->whereNull('published_at');
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('news')
            ->performOnCollections('news')
            ->fit(Manipulations::FIT_CONTAIN, 1400, 1400)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('newsWebp')
            ->performOnCollections('news')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 1400, 1400)
            ->nonQueued()
            ->nonOptimized();
    }
}
