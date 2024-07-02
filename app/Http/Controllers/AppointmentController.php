<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Notifications\DoctorReminder;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function appointments()
    {
        $appointments = Schedule::select('id', 'date', 'start_time', 'end_time', 'status')->where('status','available')->get();
        return response()->json($appointments);
    }
    public function show($id)
    {
        $appointment = Schedule::findOrFail($id);
        return view('appointment-details', ['appointment' => $appointment]);
    }

    public function book(Request $request, $id)
{
    // Retrieve the appointment by ID
    $appointment = Schedule::findOrFail($id);

    // Check if the user already has a booked appointment
    $existingAppointment = Schedule::where('user_id', $request->user_id)
                                    ->where('status', 'booked')
                                    ->first();

    if ($existingAppointment) {
        // User already has a booked appointment
        return redirect('appointment-status')->with('error', 'You can only book one appointment at a time until your current appointment is approved.');
    }
    $appointment->status = 'booked';
    $appointment->user_id = $request->user_id;
    $appointment->save();

    // Optionally, you can redirect the user to a success page or back to the appointment details
    return redirect()->route('appointment.status', $appointment->id)->with('success', 'Appointment booked successfully!');
}
public function approve_appointment($id){
    $appointment = Schedule::findOrFail($id);
    $appointment->status = 'approved';
    $appointment->save();


    // Fetch all booked appointments
    $bookedAppointments = Schedule::where('status', 'booked')->get();

    $appointment->user->notify(new DoctorReminder($appointment));


    return view('approve', compact('bookedAppointments'))->with('success', 'Appointment approved successfully');
}
public function showApprovePage()
{
    $bookedAppointments = Schedule::where('status', 'booked')->get();
    return view('approve', compact('bookedAppointments'));
}


}
