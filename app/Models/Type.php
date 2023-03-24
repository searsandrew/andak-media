<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
