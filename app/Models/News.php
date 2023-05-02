<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\SlugOptions;

class News extends Setup
{
    public $fillable = ['type_id', 'title', 'content'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function image() : MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function type() : HasOne
    {
        return $this->hasOne(Type::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
