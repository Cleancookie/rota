<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function shifts(): BelongsToMany
    {
        return $this->belongstoMany(Timeslot::class)->withTimestamps();
    }

    public function jobs(): HasManyThrough
    {
        return $this->hasManyThrough(Job::class, Assignment::class);
    }
}
