<?php

namespace App\Services;


use App\Models\Assignment;
use App\Models\Timeslot;
use Illuminate\Database\Eloquent\Collection;

class RotaService
{
    public static function makeRota(Collection $jobs, Collection $staff, Timeslot $timeslot): \Illuminate\Support\Collection
    {
        $assignments = collect([]);
        foreach ($jobs as $i => $job) {
            // Does this job already have $staff assigned to it?
            $assignment = Assignment::query()
                ->with(['job', 'timeslot', 'staff']) // can attach these manually but im being lazy zzz
                ->where('job_id', $job->id)
                ->where('timeslot_id', $timeslot->id)
                ->get()
            ;
            if ($assignment->count())
            {
                $assignments->push($assignment->first());
                continue;
            }

            // Assign a $staff to this $job
            $assignment = new Assignment();
            $assignment->job()->associate($job);

            // todo: algorithm to randomly choose a staff member.  Make it less likely to choose someone who recently did $job
            $chosen = $staff[count($staff) > count($jobs) ? $i % count($jobs) : $i % count($staff)];
            $assignment->staff()->associate($chosen);
            $assignment->timeslot()->associate($timeslot);
            $assignment->save();
            $assignments->push($assignment);
        }

        return $assignments;
    }
}
