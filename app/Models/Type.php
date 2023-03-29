<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Setup
{
    protected $fillable = ['name', 'icon'];

    public function attributes() : HasMany
    {
        return $this->hasMany(Attribute::class);
    }

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
