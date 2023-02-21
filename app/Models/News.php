<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Auth;

class News extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    public $fillable = ['title', 'content'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->user_id = Auth::user()->id;
        });
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    public function image() : MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
