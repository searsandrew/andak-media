<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Setup
{
    protected $fillable = ['type_id', 'name', 'content'];

    public function attributes() : BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
    }

    public function image() : MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function type() : BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
