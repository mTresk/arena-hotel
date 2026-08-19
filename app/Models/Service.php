<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class Service extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'slug', 'content', 'banner_title', 'banner_description', 'seo_title', 'seo_description'];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->performOnCollections('thumbs')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 350, 250);
        $this
            ->addMediaConversion('thumbWebp')
            ->performOnCollections('thumbs')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 350, 250);
        $this
            ->addMediaConversion('banner')
            ->performOnCollections('banners')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 500, 800);
        $this
            ->addMediaConversion('bannerWebp')
            ->performOnCollections('banners')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 500, 800);
        $this
            ->addMediaConversion('header')
            ->performOnCollections('headers')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 1920, 400);
        $this
            ->addMediaConversion('headerWebp')
            ->performOnCollections('headers')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 1920, 400);
        $this
            ->addMediaConversion('ogImage')
            ->performOnCollections('seo')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 1200, 630);
    }
}
