<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timeslot extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function staff()
    {
        return $this->belongsToMany(Staff::class)->withTimestamps();
    }

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class);
    }
}
