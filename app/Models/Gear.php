<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Gear extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'brand',
        'image',
        'quantity',
        'price',
        'category',
        'sport',
    ];

    const sports = [
        'Football',
        'NetBall',
        'Rugby',
    ];

    const categories = [
        'Indoor game',
        'Outdoor game',
    ];

    /**
     * Scope a query to filter results.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $params)
    {
        if ( isset($params['keyword']) && trim($params['keyword'] !== '') ) {
            $query->where('name', 'LIKE', trim($params['keyword']) . '%');
        }

        if ( isset($params['category']) && trim($params['category']) !== '' )
        {
            $query->where('category', '=', trim($params['category']));
        }

        if ( isset($params['sport']) && trim($params['sport']) !== '' )
        {
            $query->where('sport', '=', trim($params['sport']));
        }

        return $query;
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

     /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get all of the gearRequest for the Gear
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gearRequest(): HasMany
    {
        return $this->hasMany(GearRequest::class);
    }

    /**
     * Get all of the issued_gear for the Gear
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function issued_gear(): HasManyThrough
    {
        return $this->hasManyThrough(IssuedGear::class, GearRequest::class);
    }
}
