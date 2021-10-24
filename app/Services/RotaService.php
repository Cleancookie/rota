<?php

namespace App\Services;

use App\Models\Assignment;
use App\Models\Timeslot;
use Illuminate\Database\Eloquent\Collection;

class RotaService
{
    public static function makeRota(Collection $jobs, Collection $staff, Timeslot $timeslot)
    {
        $assignments = collect([]);
        $preassigned = Assignment::query()
            ->where('timeslot_id', $timeslot->id)
            ->get()
        ;
        $takenStaff = collect([]);
        $takenJobs = collect([]);
        $openStaff = $staff;

        foreach ($jobs as $i => $job) {
            // Does this job already have $staff assigned to it?  this is an N+1 but id rather code be easy to read
            /** @var Assignment $assignment */
            $assignment = $preassigned
                ->where('job_id', $job->id)
                ->where('timeslot_id', $timeslot->id)
                ->first()
            ;
            if ($assignment !== null)
            {
                $assignment->setRelation('job', $job);
                $assignment->setRelation('timeslot', $timeslot);
                $assignment->setRelation('staff', $staff->firstWhere('id', $assignment->staff_id));
                $assignments->push($assignment);
            } else {
                // Are there any available staff left?
                if ($takenStaff->count() >= $staff->count()) {
                    break;
                }

                // Assign a $staff to this $job
                $assignment = new Assignment();
                $assignment->job()->associate($job);

                // todo: algorithm to randomly choose a staff member.  Make it less likely to choose someone who recently did $job
                if ($openStaff->count() === 0) {
                    break;
                }
                $chosen = $openStaff->random();
                $assignment->staff()->associate($chosen);
                $assignment->timeslot()->associate($timeslot);
                $assignment->save();
                $assignments->push($assignment);
            }

            $openStaff = $openStaff->filter(function ($staff) use ($assignment) {
                return $staff !== $assignment->staff;
            });
            $takenJobs->push($assignment->job);
        }

        return [
            'assignments' => $assignments,
            'openStaff' => $openStaff,
            'openJobs' => $jobs->filter(function ($job) use ($takenJobs) {
                return !$takenJobs->contains($job);
            }),
            'timeslot' => $timeslot,
        ];
    }
}
