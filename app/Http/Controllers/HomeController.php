<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $events = [];
 
        $appointments = Appointment::with(['patient', 'doctor'])->get();
 
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->patient->name . ' ('.$appointment->doctor->name.')',
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        }
 
        return view('home', compact('events'));
    }
}