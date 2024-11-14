<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

// Dashboard route
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Routes for each form type
Route::post('/forms/attendance/submit', [FormController::class, 'submitAttendance'])->name('forms.attendance.submit');

Route::post('/forms/itinerary/submit', [FormController::class, 'submitItinerary'])->name('forms.itinerary.submit');

Route::post('/forms/reimbursement/submit', [FormController::class, 'submitReimbursement'])->name('forms.reimbursement.submit');

Route::post('/forms/gatepass/submit', [FormController::class, 'submitGatePass'])->name('forms.gatepass.submit');

Route::post('/forms/excuse/submit', [FormController::class, 'submitExcuse'])->name('forms.excuse.submit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route for displaying all attendance data
Route::get('/show-attendance', [AttendanceController::class, 'showAttendanceForm'])->name('showAttendance.index');





require __DIR__.'/auth.php';
