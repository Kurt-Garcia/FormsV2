<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ListOfDataController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard route - redirect based on role
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');

    // Regular user routes
    Route::middleware(['auth', 'user'])->group(function () {
        // Form submission routes - each with unique path
        Route::post('/forms/attendance/submit', [FormController::class, 'submitAttendance'])->name('forms.attendance.submit');
        Route::post('/forms/itinerary/submit', [FormController::class, 'submitItinerary'])->name('forms.itinerary.submit');
        Route::post('/forms/reimbursement/submit', [FormController::class, 'submitReimbursement'])->name('forms.reimbursement.submit');
        Route::post('/forms/gatepass/submit', [FormController::class, 'submitGatePass'])->name('forms.gatepass.submit');
        Route::post('/forms/excuse/submit', [FormController::class, 'submitExcuse'])->name('forms.excuse.submit');
    });

    // Admin routes
    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/pending-requests', [AdminController::class, 'pendingRequests'])->name('pending-requests');
        Route::get('/all-records', [AdminController::class, 'allRecords'])->name('all-records');
        Route::post('/approve/{type}/{id}', [AdminController::class, 'approve'])->name('approve');
        Route::post('/decline/{type}/{id}', [AdminController::class, 'decline'])->name('decline');
        
        // User management routes
        Route::get('/users', [AdminController::class, 'manageUsers'])->name('users');
        Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
        Route::post('/users/store', [AdminController::class, 'storeUser'])->name('users.store');
        Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    });

    // Data listing routes - accessible by admin only
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/list-of-data', [ListOfDataController::class, 'index'])->name('data.index');
        Route::get('/data/attendance', [ListOfDataController::class, 'showAttendance'])->name('data.attendance');
        Route::get('/data/itinerary', [ListOfDataController::class, 'showItinerary'])->name('data.itinerary');
        Route::get('/data/reimbursement', [ListOfDataController::class, 'showReimbursement'])->name('data.reimbursement');
        Route::get('/data/gatepass', [ListOfDataController::class, 'showGatePass'])->name('data.gatepass');
        Route::get('/data/excuse', [ListOfDataController::class, 'showExcuse'])->name('data.excuse');
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
