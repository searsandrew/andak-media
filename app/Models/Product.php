<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Setup
{
    protected $fillable = ['name', 'content'];

    public function type() : BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
