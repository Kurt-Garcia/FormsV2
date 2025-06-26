<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Itinerary;
use App\Models\Reimbursement;
use App\Models\GatePass;
use App\Models\Excuse;
use Illuminate\Http\Request;

class ListOfDataController extends Controller
{
    public function index()
    {
        return view('data.index');
    }

    public function showAttendance()
    {
        $attendances = Attendance::orderBy('created_at', 'desc')->get();
        return view('data.attendance', compact('attendances'));
    }

    public function showItinerary()
    {
        $itineraries = Itinerary::orderBy('created_at', 'desc')->get();
        return view('data.itinerary', compact('itineraries'));
    }

    public function showReimbursement()
    {
        $reimbursements = Reimbursement::orderBy('created_at', 'desc')->get();
        return view('data.reimbursement', compact('reimbursements'));
    }

    public function showGatePass()
    {
        $gatePasses = GatePass::orderBy('created_at', 'desc')->get();
        return view('data.gatepass', compact('gatePasses'));
    }

    public function showExcuse()
    {
        $excuses = Excuse::orderBy('created_at', 'desc')->get();
        return view('data.excuse', compact('excuses'));
    }
}
