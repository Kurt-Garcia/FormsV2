<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ListOfDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Data listing routes
    Route::get('/list-of-data', [ListOfDataController::class, 'index'])->name('data.index');
    Route::get('/data/attendance', [ListOfDataController::class, 'showAttendance'])->name('data.attendance');
    Route::get('/data/itinerary', [ListOfDataController::class, 'showItinerary'])->name('data.itinerary');
    Route::get('/data/reimbursement', [ListOfDataController::class, 'showReimbursement'])->name('data.reimbursement');
    Route::get('/data/gatepass', [ListOfDataController::class, 'showGatePass'])->name('data.gatepass');
    Route::get('/data/excuse', [ListOfDataController::class, 'showExcuse'])->name('data.excuse');

    // Form submission routes - each with unique path
    Route::post('/forms/attendance/submit', [FormController::class, 'submitAttendance'])->name('forms.attendance.submit');
    Route::post('/forms/itinerary/submit', [FormController::class, 'submitItinerary'])->name('forms.itinerary.submit');
    Route::post('/forms/reimbursement/submit', [FormController::class, 'submitReimbursement'])->name('forms.reimbursement.submit');
    Route::post('/forms/gatepass/submit', [FormController::class, 'submitGatePass'])->name('forms.gatepass.submit');
    Route::post('/forms/excuse/submit', [FormController::class, 'submitExcuse'])->name('forms.excuse.submit');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
