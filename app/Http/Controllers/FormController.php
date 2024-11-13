<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Attendance;   
use App\Models\Itinerary;     
use App\Models\Reimbursement;   
use App\Models\GatePass;        
use App\Models\Excuse;          

class FormController extends Controller{

    public function submitAttendance(Request $request){
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'attendance_date' => 'required|date',
            'status' => 'required|string',
        ]);

        Attendance::create($request->all());

        return back()->with('success', 'Attendance submitted successfully!');
    }


    // Handle Itinerary Form submission
    public function submitItinerary(Request $request){
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'itinerary_date' => 'required|date',
            'destination' => 'required|string|max:255',
            'purpose' => 'required|string',
        ]);

        Itinerary::create($request->all());

        return back()->with('success', 'Itinerary submitted successfully!');
    }



    // Handle Reimbursement Form submission
    public function submitReimbursement(Request $request){
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'reimbursement_date' => 'required|date',
            'expense_type' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Reimbursement::create($request->all());

        return back()->with('success', 'Reimbursement submitted successfully!');
    }



    // Handle Gate Pass Form submission
    public function submitGatePass(Request $request){
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i',
            'destination' => 'required|string|max:255',
            'reason' => 'required|string',
        ]);
    
        GatePass::create($request->all());
    
        return back()->with('success', 'Gate Pass submitted successfully!');
    }
    

    // Handle Excuse Form submission
    public function submitExcuse(Request $request){
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'excuse_date' => 'required|date',
            'kind_of_excuse' => 'required|string',
            'reason' => 'required|string',
        ]);

        Excuse::create($request->all());

        return back()->with('success', 'Excuse submitted successfully!');
    }


}
