<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends BaseModel
{
    use HasFactory;
    use HasSlug;

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'category_id',
        'sku',
        'slug',
        'name',
        'description',
        'price',
        'disc_price',
        'stock',
        'weight',
        'sold_count',
        'published_at'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return (new SlugOptions())
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at');
    }
}
