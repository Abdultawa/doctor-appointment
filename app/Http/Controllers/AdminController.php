<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }
    public function show()
    {
        return view('admin.show');
    }
    public function store(Schedule $schedule)
    {
        request()->validate([
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        $schedule->create([
            'date' => request('date'),
            'start_time' => request('start_time'),
            'end_time' => request('end_time')
        ]);

        return back();
    }
  
    
}
