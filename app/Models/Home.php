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

final class Home extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'banner1_title', 'banner2_title', 'banner1_description', 'banner2_description', 'slider1_title', 'slider2_title', 'features', 'seo_title', 'seo_description',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('heroImage')
            ->performOnCollections('hero_image')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 1440, 1080);
        $this
            ->addMediaConversion('heroImageWebp')
            ->performOnCollections('hero_image')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 1440, 1080);
        $this
            ->addMediaConversion('heroImageMobileWebp')
            ->performOnCollections('hero_image')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 520, 520);
        $this
            ->addMediaConversion('heroImageMobile')
            ->performOnCollections('hero_image')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 520, 520);
        $this
            ->addMediaConversion('heroImage@2')
            ->performOnCollections('hero_image')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 2880, 2880);
        $this
            ->addMediaConversion('heroImageWebp@2')
            ->performOnCollections('hero_image')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 2880, 2880);
        $this
            ->addMediaConversion('banner')
            ->performOnCollections('banner')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 400, 610);
        $this
            ->addMediaConversion('bannerWebp')
            ->performOnCollections('banner')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 400, 610);
        $this
            ->addMediaConversion('banner')
            ->performOnCollections('banner1')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 400, 610);
        $this
            ->addMediaConversion('bannerWebp')
            ->performOnCollections('banner1')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 400, 610);
        $this
            ->addMediaConversion('ogImage')
            ->performOnCollections('seo')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 1200, 630);
    }
}
