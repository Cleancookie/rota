<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Staff;
use App\Models\Timeslot;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Timeslots
        $morning = new Timeslot();
        $morning->name = 'Morning';
        $morning->start = '9:00';
        $morning->save();

        $afternoon = new Timeslot();
        $afternoon->name = 'Afternoon';
        $afternoon->start = '12:30';
        $afternoon->save();

        // Staff
        $alex = new Staff();
        $alex->name = 'Alex';
        $alex->save();
        $alex->shifts()->attach($afternoon);

        $darren = new Staff();
        $darren->name = 'Darren';
        $darren->save();
        $darren->shifts()->attach($morning);
        $darren->shifts()->attach($afternoon);

        $susan = new Staff();
        $susan->name = 'Susan';
        $susan->save();
        $susan->shifts()->attach($morning);
        $susan->shifts()->attach($afternoon);

        $quincy = new Staff();
        $quincy->name = 'Quincy';
        $quincy->save();
        $quincy->shifts()->attach($afternoon);

        // Jobs
        $morningCook = new Job();
        $morningCook->name = 'Cook (Morning)';
        $morningCook->timeslot()->associate($morning);
        $morningCook->save();

        $afternoonCook = new Job();
        $afternoonCook->name = 'Cook (Afternoon)';
        $afternoonCook->timeslot()->associate($afternoon);
        $afternoonCook->save();

        $morningTill = new Job();
        $morningTill->name = 'Till (Morning)';
        $morningTill->timeslot()->associate($morning);
        $morningTill->save();

        $afternoonTill = new Job();
        $afternoonTill->name = 'Till (Afternoon)';
        $afternoonTill->timeslot()->associate($afternoon);
        $afternoonTill->save();

        $morningCleaner = new Job();
        $morningCleaner->name = 'Cleaner (Morning)';
        $morningCleaner->timeslot()->associate($morning);
        $morningCleaner->save();

        $afternoonCleaner = new Job();
        $afternoonCleaner->name = 'Cleaner (Afternoon)';
        $afternoonCleaner->timeslot()->associate($afternoon);
        $afternoonCleaner->save();
    }
}
