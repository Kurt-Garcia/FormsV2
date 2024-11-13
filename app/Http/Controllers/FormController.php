<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showAttendanceForm()
    {
        return view('forms.attendance');
    }

    public function showItineraryForm()
    {
        return view('forms.itinerary');
    }

    public function showReimbursementForm()
    {
        return view('forms.reimbursement');
    }
}
