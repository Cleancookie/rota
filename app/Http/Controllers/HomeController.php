<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Timeslot;
use App\Services\RotaService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $timeslots = Timeslot::with(['jobs', 'staff'])->get();

        $rotas = $timeslots->map(function(Timeslot $timeslot) {
            return RotaService::makeRota($timeslot->jobs, $timeslot->staff, $timeslot);
        })->flatten(1)->sortBy('timeslot.start');

        return view('home', ['rotas' => $rotas]);
    }
}
