<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class AppointmentStatusController extends Controller
{

    public function create()
    {
        return view('dashboard');
    }
    public function status()
    {
        // Fetch appointments for the currently authenticated user
        $userAppointments = Schedule::where('user_id', auth()->id())->get();
    
        // Pass the appointments data to the view
        return view('appointment-status', ['appointments' => $userAppointments]);
    }
}

