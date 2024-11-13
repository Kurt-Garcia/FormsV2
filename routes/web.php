<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Routes for each form type
Route::middleware(['auth'])->get('/forms/attendance', [FormController::class, 'showAttendanceForm'])->name('forms.attendance');
Route::middleware(['auth'])->get('/forms/itinerary', [FormController::class, 'showItineraryForm'])->name('forms.itinerary');
Route::middleware(['auth'])->get('/forms/reimbursement', [FormController::class, 'showReimbursementForm'])->name('forms.reimbursement');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
