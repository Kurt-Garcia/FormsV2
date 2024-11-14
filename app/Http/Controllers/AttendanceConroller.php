<?php

namespace App\Http\Controllers;

use App\Models\Attendance;

use Illuminate\Http\Request;

class AttendanceConroller extends Controller
{
    // In AttendanceController.php
    public function showAttendanceForm()
    {
        $attendances = Attendance::all();
        return view('showAttendance', compact('attendances'));
    }


}
