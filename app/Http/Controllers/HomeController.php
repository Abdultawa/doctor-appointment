<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Fetch all appointments
        $appointments = Schedule::all();

        // Pass the appointments to the view
        return view('home', compact('appointments'));
    }
    
}
