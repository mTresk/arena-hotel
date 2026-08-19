<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class Room extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['name', 'description', 'price', 'facilities', 'seo_title', 'seo_description', 'seo_image', 'category_id'];

    protected $casts = [
        'facilities' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

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
            ->fit(Fit::Contain, 430, 430);
        $this
            ->addMediaConversion('thumbWebp')
            ->performOnCollections('thumbs')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 430, 430);
        $this
            ->addMediaConversion('thumb@2')
            ->performOnCollections('thumbs')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 860, 860);
        $this
            ->addMediaConversion('thumbWebp@2')
            ->performOnCollections('thumbs')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Contain, 860, 860);
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
            ->addMediaConversion('slider')
            ->performOnCollections('sliders')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Crop, 1000, 540);
        $this
            ->addMediaConversion('sliderWebp')
            ->performOnCollections('sliders')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Crop, 1000, 540);
        $this
            ->addMediaConversion('sliderThumb')
            ->performOnCollections('sliders')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Crop, 200, 140);
        $this
            ->addMediaConversion('sliderThumbWebp')
            ->performOnCollections('sliders')
            ->nonQueued()
            ->nonOptimized()
            ->format('webp')
            ->fit(Fit::Crop, 200, 140);
        $this
            ->addMediaConversion('ogImage')
            ->performOnCollections('seo')
            ->nonQueued()
            ->nonOptimized()
            ->fit(Fit::Contain, 1200, 630);
    }

    protected function thumb(): Attribute
    {
        $collections = $this->getMedia('thumbs');

        $thumbs = [];

        foreach ($collections as $collection) {
            $thumbs[] = [
                'thumb' => $collection->getUrl('thumb'),
                'thumbWebp' => $collection->getUrl('thumbWebp'),
                'thumbBig' => $collection->getUrl('thumb@2'),
                'thumbBigWebp' => $collection->getUrl('thumbWebp@2'),
            ];
        }

        return Attribute::make(
            get: fn () => ($thumbs));
    }
}
