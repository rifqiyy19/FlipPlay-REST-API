<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Media extends Model
{
    protected $fillable = [
        'title',
        'genre',
        'year',
        'type',
        'episodes',
        'chapters',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
                    ->withTimestamps();
    }
}