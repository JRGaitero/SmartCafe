<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class School extends Model
{
    protected $table = 'schools';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cafes(): BelongsToMany
    {
        return $this->belongsToMany(Cafe::class);
    }

    use HasFactory;
}
