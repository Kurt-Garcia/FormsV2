<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ListOfDataController;
use Illuminate\Support\Facades\Route;


Route::get('/att', [ListOfDataController::class, 'showAtt']);
Route::get('/itn', [ListOfDataController::class, 'showItn']);
Route::get('/reb', [ListOfDataController::class, 'showReb']);
Route::get('/gpp', [ListOfDataController::class, 'showGpp']);
Route::get('/exc', [ListOfDataController::class, 'showExc']);


Route::get('/', function () {
    return view('login');
});

// Dashboard route
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Routes for each form type
Route::post('/submit', [FormController::class, 'submitAttendance'])->name('forms.attendance.submit');

Route::post('/submit', [FormController::class, 'submitItinerary'])->name('forms.itinerary.submit');

Route::post('/submit', [FormController::class, 'submitReimbursement'])->name('forms.reimbursement.submit');

Route::post('/submit', [FormController::class, 'submitGatePass'])->name('forms.gatepass.submit');

Route::post('/submit', [FormController::class, 'submitExcuse'])->name('forms.excuse.submit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
