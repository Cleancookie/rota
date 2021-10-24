<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use App\Services\RotaService;

class HomeController extends Controller
{
    public function index()
    {
        // Scope assignments to this week's only
        $timeslots = Timeslot::with(['jobs', 'staff'])->get();

        $rotas = $timeslots->map(function(Timeslot $timeslot) {
            return RotaService::makeRota($timeslot->jobs, $timeslot->staff, $timeslot);
        })
            ->flatten(1)
            ->sortBy('timeslot.start')
        ;

        return view('home', ['rotas' => $rotas]);
    }
}
