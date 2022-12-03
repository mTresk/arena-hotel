<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'slug', 'content', 'banner_title', 'banner_description', 'seo_title', 'seo_description'];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->performOnCollections('thumbs')
            ->fit(Manipulations::FIT_CONTAIN, 350, 250)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('thumbWebp')
            ->performOnCollections('thumbs')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 350, 250)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('banner')
            ->performOnCollections('banners')
            ->fit(Manipulations::FIT_CONTAIN, 500, 800)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('bannerWebp')
            ->performOnCollections('banners')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 500, 800)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('header')
            ->performOnCollections('headers')
            ->fit(Manipulations::FIT_CONTAIN, 1920, 400)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('headerWebp')
            ->performOnCollections('headers')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 1920, 400)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('ogImage')
            ->performOnCollections('seo')
            ->fit(Manipulations::FIT_CONTAIN, 1200, 630)
            ->nonQueued()
            ->nonOptimized();
    }
}
