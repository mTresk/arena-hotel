<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Room extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['name', 'description', 'price', 'facilities', 'seo_title', 'seo_description', 'seo_image', 'category_id'];

    protected $casts = [
        'facilities' => 'array',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->performOnCollections('thumbs')
            ->fit(Manipulations::FIT_CROP, 600, 700)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('thumbWebp')
            ->performOnCollections('thumbs')
            ->format('webp')
            ->fit(Manipulations::FIT_CROP, 600, 700)
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
            ->addMediaConversion('slider')
            ->performOnCollections('sliders')
            ->fit(Manipulations::FIT_CROP, 1000, 540)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('sliderWebp')
            ->performOnCollections('sliders')
            ->format('webp')
            ->fit(Manipulations::FIT_CROP, 1000, 540)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('sliderThumb')
            ->performOnCollections('sliders')
            ->fit(Manipulations::FIT_CROP, 200, 140)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('sliderThumbWebp')
            ->performOnCollections('sliders')
            ->format('webp')
            ->fit(Manipulations::FIT_CROP, 200, 140)
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
