<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Setup
{
    public $fillable = ['title', 'content'];

    public function image() : MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
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
