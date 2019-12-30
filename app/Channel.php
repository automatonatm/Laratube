<?php

namespace Laratube;



use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Channel
 * @package Laratube
 */
class Channel extends Model implements HasMedia
{

    use HasMediaTrait, Channeling;
    /**
     * @var array
     */
    protected $guarded = [],  $with = ['subscriptions'];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\MorphMany|object|null
     */
    public function image()
    {
        if($this->media->first()) {
            return $this->media()->first()->getFullUrl('thumb');
        }
        return null;
    }

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(?Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(100);



    }

    public function editable()
    {
       if (!auth()->check())  return false;
       return $this->user_id === auth()->id();
    }
    
    




}
