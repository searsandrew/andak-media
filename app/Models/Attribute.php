<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Setup
{
    public $fillable = ['name', 'type'];

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function type() : BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
