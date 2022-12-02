<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RoomsPage extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'rooms_pages';

    protected $fillable = ['page_title', 'seo_title', 'seo_description'];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('header')
            ->performOnCollections('headers')
            ->fit(Manipulations::FIT_CROP, 1920, 400)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('headerWebp')
            ->format('webp')
            ->performOnCollections('headers')
            ->fit(Manipulations::FIT_CROP, 1920, 400)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('ogImage')
            ->performOnCollections('seo')
            ->fit(Manipulations::FIT_CROP, 1200, 630)
            ->nonQueued()
            ->nonOptimized();
    }
}
