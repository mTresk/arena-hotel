<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class Post extends Model implements HasMedia
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
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('news')
            ->performOnCollections('news')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 860, 860);
        $this
            ->addMediaConversion('news@2')
            ->performOnCollections('news')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 1720, 1720);
        $this
            ->addMediaConversion('newsWebp')
            ->performOnCollections('news')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 860, 860);
        $this
            ->addMediaConversion('newsWebp@2')
            ->performOnCollections('news')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 1720, 1720);
        $this
            ->addMediaConversion('newsThumb')
            ->performOnCollections('news')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 350, 350);
        $this
            ->addMediaConversion('newsThumbWebp')
            ->performOnCollections('news')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 350, 350);
        $this
            ->addMediaConversion('newsThumb@2')
            ->performOnCollections('news')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 700, 700);
        $this
            ->addMediaConversion('newsThumbWebp@2')
            ->performOnCollections('news')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 700, 700);
    }

    protected function image(): Attribute
    {
        $collection = $this->getMedia('news')->last();

        return Attribute::make(
            get: fn () => (
                [
                    'news' => $collection->getUrl('news'),
                    'newsWebp' => $collection->getUrl('newsWebp'),
                    'newsBig' => $collection->getUrl('news@2'),
                    'newsBigWebp' => $collection->getUrl('newsWebp@2'),
                ])
        );
    }

    protected function thumb(): Attribute
    {
        $collection = $this->getMedia('news')->last();

        return Attribute::make(
            get: fn () => (
                [
                    'newsThumb' => $collection->getUrl('newsThumb'),
                    'newsThumbWebp' => $collection->getUrl('newsThumbWebp'),
                    'newsThumbBig' => $collection->getUrl('newsThumb@2'),
                    'newsThumbBigWebp' => $collection->getUrl('newsThumbWebp@2'),
                ])
        );
    }
}
