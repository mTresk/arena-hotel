<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Home extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'banner1_title',
        'banner2_title',
        'banner1_description',
        'banner2_description',
        'slider1_title',
        'slider2_title',
        'features'
    ];

    protected $casts = [
        'features' => 'array',
    ];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('heroImage')
            ->performOnCollections('hero_image')
            ->fit(Manipulations::FIT_CONTAIN, 1920, 1080)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('heroImageWebp')
            ->format('webp')
            ->performOnCollections('hero_image')
            ->fit(Manipulations::FIT_CONTAIN, 1920, 1080)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('banner')
            ->performOnCollections('banner')
            ->fit(Manipulations::FIT_CONTAIN, 400, 610)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('bannerWebp')
            ->format('webp')
            ->performOnCollections('banner')
            ->fit(Manipulations::FIT_CONTAIN, 400, 610)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('banner')
            ->performOnCollections('banner1')
            ->fit(Manipulations::FIT_CONTAIN, 400, 610)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('bannerWebp')
            ->format('webp')
            ->performOnCollections('banner1')
            ->fit(Manipulations::FIT_CONTAIN, 400, 610)
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
