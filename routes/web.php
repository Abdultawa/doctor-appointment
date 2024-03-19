<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentStatusController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [AppointmentStatusController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('home', \App\Http\Controllers\HomeController::class)->name('home');
require __DIR__.'/auth.php';

// Route::middleware('can:admin')->group(function () {
//     Route::resource('admin/posts', AdminPostController::class)->except('show');
// });

Route::get('/admin', [AdminController::class, 'create'])->name('admin.create');
Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/appointments', [AppointmentController::class, 'appointments'])->name('appointment');

Route::get('/appointment-details/{id}', [AppointmentController::class, 'show'])->name('appointment.details');
Route::get('/appointment-status', [AppointmentStatusController::class, 'status'])->name('appointment.status');
Route::get('/appointments/approve', [AppointmentController::class, 'showApprovePage'])->name('appointment.approve_page');
Route::post('/appointments/{id}/book', [AppointmentController::class, 'book'])->name('appointment.book');
Route::post('/appointments/{id}/approve', [AppointmentController::class, 'approve_appointment'])->name('appointment.approve');


