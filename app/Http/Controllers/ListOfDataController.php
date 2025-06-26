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
    public function showAtt()
    {
        $attData = Attendance::all();
        return response()->json($attData); // Return data as JSON
    }

    public function showItn()
    {
        $itnData = Itinerary::all();
        return response()->json($itnData);
    }

    public function showReb()
    {
        $rebData = Reimbursement::all();
        return response()->json($rebData);
    }

    public function showGpp()
    {
        $gppData = GatePass::all();
        return response()->json($gppData);
    }

    public function showExc()
    {
        $excData = Excuse::all();
        return response()->json($excData);
    }
}
