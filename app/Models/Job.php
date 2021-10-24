<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function timeslot(): BelongsTo
    {
        return $this->belongsTo(Timeslot::class, 'timeslot_id');
    }

    public function staff(): HasManyThrough
    {
        return $this->hasManyThrough(Staff::class, Assignment::class);
    }
}
