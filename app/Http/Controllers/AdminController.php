<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Itinerary;
use App\Models\Reimbursement;
use App\Models\GatePass;
use App\Models\Excuse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function dashboard()
    {
        $stats = [
            'pending_attendance' => Attendance::where('status_approval', 'pending')->count(),
            'pending_itinerary' => Itinerary::where('status_approval', 'pending')->count(),
            'pending_reimbursement' => Reimbursement::where('status_approval', 'pending')->count(),
            'pending_gatepass' => GatePass::where('status_approval', 'pending')->count(),
            'pending_excuse' => Excuse::where('status_approval', 'pending')->count(),
            'total_users' => User::where('role', 'user')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Show all pending requests
     */
    public function pendingRequests()
    {
        $pendingRequests = [
            'attendance' => Attendance::where('status_approval', 'pending')->latest()->get(),
            'itinerary' => Itinerary::where('status_approval', 'pending')->latest()->get(),
            'reimbursement' => Reimbursement::where('status_approval', 'pending')->latest()->get(),
            'gatepass' => GatePass::where('status_approval', 'pending')->latest()->get(),
            'excuse' => Excuse::where('status_approval', 'pending')->latest()->get(),
        ];

        return view('admin.pending-requests', compact('pendingRequests'));
    }

    /**
     * Show all records with filters
     */
    public function allRecords(Request $request)
    {
        $type = $request->get('type', 'all');
        $status = $request->get('status', 'all');

        $records = [];

        if ($type === 'all' || $type === 'attendance') {
            $query = Attendance::with('approvedBy');
            if ($status !== 'all') $query->where('status_approval', $status);
            $records['attendance'] = $query->latest()->get();
        }

        if ($type === 'all' || $type === 'itinerary') {
            $query = Itinerary::with('approvedBy');
            if ($status !== 'all') $query->where('status_approval', $status);
            $records['itinerary'] = $query->latest()->get();
        }

        if ($type === 'all' || $type === 'reimbursement') {
            $query = Reimbursement::with('approvedBy');
            if ($status !== 'all') $query->where('status_approval', $status);
            $records['reimbursement'] = $query->latest()->get();
        }

        if ($type === 'all' || $type === 'gatepass') {
            $query = GatePass::with('approvedBy');
            if ($status !== 'all') $query->where('status_approval', $status);
            $records['gatepass'] = $query->latest()->get();
        }

        if ($type === 'all' || $type === 'excuse') {
            $query = Excuse::with('approvedBy');
            if ($status !== 'all') $query->where('status_approval', $status);
            $records['excuse'] = $query->latest()->get();
        }

        return view('admin.all-records', compact('records', 'type', 'status'));
    }

    /**
     * Approve a record
     */
    public function approve(Request $request, $type, $id)
    {
        $request->validate([
            'admin_remarks' => 'nullable|string|max:500'
        ]);

        $model = $this->getModel($type);
        $record = $model::findOrFail($id);

        $record->update([
            'status_approval' => 'approved',
            'admin_remarks' => $request->admin_remarks,
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => ucfirst($type) . ' request approved successfully!'
        ]);
    }

    /**
     * Decline a record
     */
    public function decline(Request $request, $type, $id)
    {
        $request->validate([
            'admin_remarks' => 'required|string|max:500'
        ]);

        $model = $this->getModel($type);
        $record = $model::findOrFail($id);

        $record->update([
            'status_approval' => 'declined',
            'admin_remarks' => $request->admin_remarks,
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => ucfirst($type) . ' request declined successfully!'
        ]);
    }

    /**
     * Get model class based on type
     */
    private function getModel($type)
    {
        return match ($type) {
            'attendance' => Attendance::class,
            'itinerary' => Itinerary::class,
            'reimbursement' => Reimbursement::class,
            'gatepass' => GatePass::class,
            'excuse' => Excuse::class,
            default => throw new \InvalidArgumentException('Invalid type')
        };
    }
}
