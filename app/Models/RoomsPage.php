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

final class RoomsPage extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'rooms_pages';

    protected $fillable = ['page_title', 'seo_title', 'seo_description'];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('header')
            ->performOnCollections('headers')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 1440, 460);
        $this
            ->addMediaConversion('headerWebp')
            ->performOnCollections('headers')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 1440, 460);
        $this
            ->addMediaConversion('header@2')
            ->performOnCollections('headers')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 2880, 920);
        $this
            ->addMediaConversion('headerWebp@2')
            ->performOnCollections('headers')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 2880, 920);
        $this
            ->addMediaConversion('headerMobile')
            ->performOnCollections('headers')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 540, 460);
        $this
            ->addMediaConversion('headerMobileWebp')
            ->performOnCollections('headers')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 540, 460);
        $this
            ->addMediaConversion('ogImage')
            ->performOnCollections('seo')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 1200, 630);
    }
}
