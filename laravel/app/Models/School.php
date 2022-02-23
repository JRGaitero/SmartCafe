<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    protected $table = 'schools';
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cafes(): BelongsToMany
    {
        return $this->belongsToMany(Cafe::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    use HasFactory;
}
