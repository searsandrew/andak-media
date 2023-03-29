<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Setup
{
    protected $fillable = ['name', 'content'];

    public function attributes() : BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
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
