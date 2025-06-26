<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show(Request $request): View
    {
        $user = $request->user();
        
        // Get user's recent activity (last 10 form submissions)
        $recentActivity = collect();
        
        try {
            // Add recent attendances
            $user->attendances()->latest()->take(3)->get()->each(function($item) use ($recentActivity) {
                $recentActivity->push([
                    'type' => 'Attendance',
                    'date' => $item->attendance_date ?? $item->created_at,
                    'status' => $item->status_approval ?? 'pending',
                    'icon' => 'bi-calendar-check',
                    'color' => 'blue',
                    'details' => $item->status ?? 'N/A'
                ]);
            });
            
            // Add recent itineraries
            $user->itineraries()->latest()->take(3)->get()->each(function($item) use ($recentActivity) {
                $recentActivity->push([
                    'type' => 'Itinerary',
                    'date' => $item->itinerary_date ?? $item->created_at,
                    'status' => $item->status_approval ?? 'pending',
                    'icon' => 'bi-geo-alt',
                    'color' => 'green',
                    'details' => $item->destination ?? 'N/A'
                ]);
            });
            
            // Add recent reimbursements
            $user->reimbursements()->latest()->take(3)->get()->each(function($item) use ($recentActivity) {
                $recentActivity->push([
                    'type' => 'Reimbursement',
                    'date' => $item->reimbursement_date ?? $item->created_at,
                    'status' => $item->status_approval ?? 'pending',
                    'icon' => 'bi-cash-coin',
                    'color' => 'yellow',
                    'details' => '$' . number_format($item->amount ?? 0, 2)
                ]);
            });
            
            // Add recent gate passes
            $user->gatePasses()->latest()->take(2)->get()->each(function($item) use ($recentActivity) {
                $recentActivity->push([
                    'type' => 'Gate Pass',
                    'date' => $item->date ?? $item->created_at,
                    'status' => $item->status_approval ?? 'pending',
                    'icon' => 'bi-door-open',
                    'color' => 'cyan',
                    'details' => $item->destination ?? 'N/A'
                ]);
            });
            
            // Add recent excuses
            $user->excuses()->latest()->take(2)->get()->each(function($item) use ($recentActivity) {
                $recentActivity->push([
                    'type' => 'Excuse Letter',
                    'date' => $item->excuse_date ?? $item->created_at,
                    'status' => $item->status_approval ?? 'pending',
                    'icon' => 'bi-person-x',
                    'color' => 'red',
                    'details' => $item->kind_of_excuse ?? 'N/A'
                ]);
            });
        } catch (\Exception $e) {
            // If there's any error fetching activity, just continue with empty collection
            Log::error('Error fetching user activity: ' . $e->getMessage());
        }
        
        // Sort by date and take the most recent 10
        $recentActivity = $recentActivity->sortByDesc('date')->take(10);
        
        return view('profile.show', [
            'user' => $user,
            'recentActivity' => $recentActivity,
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        
        // Get user's recent activity (last 10 form submissions)
        $recentActivity = collect();
        
        // Add recent attendances
        $user->attendances()->latest()->take(3)->get()->each(function($item) use ($recentActivity) {
            $recentActivity->push([
                'type' => 'Attendance',
                'date' => $item->attendance_date,
                'status' => $item->status_approval,
                'icon' => 'bi-calendar-check',
                'color' => 'primary'
            ]);
        });
        
        // Add recent itineraries
        $user->itineraries()->latest()->take(3)->get()->each(function($item) use ($recentActivity) {
            $recentActivity->push([
                'type' => 'Itinerary',
                'date' => $item->itinerary_date,
                'status' => $item->status_approval,
                'icon' => 'bi-geo-alt',
                'color' => 'success'
            ]);
        });
        
        // Add recent reimbursements
        $user->reimbursements()->latest()->take(3)->get()->each(function($item) use ($recentActivity) {
            $recentActivity->push([
                'type' => 'Reimbursement',
                'date' => $item->reimbursement_date,
                'status' => $item->status_approval,
                'icon' => 'bi-cash-coin',
                'color' => 'warning'
            ]);
        });
        
        // Add recent gate passes
        $user->gatePasses()->latest()->take(2)->get()->each(function($item) use ($recentActivity) {
            $recentActivity->push([
                'type' => 'Gate Pass',
                'date' => $item->date,
                'status' => $item->status_approval,
                'icon' => 'bi-door-open',
                'color' => 'info'
            ]);
        });
        
        // Add recent excuses
        $user->excuses()->latest()->take(2)->get()->each(function($item) use ($recentActivity) {
            $recentActivity->push([
                'type' => 'Excuse Letter',
                'date' => $item->excuse_date,
                'status' => $item->status_approval,
                'icon' => 'bi-person-x',
                'color' => 'danger'
            ]);
        });
        
        // Sort by date and take the most recent 10
        $recentActivity = $recentActivity->sortByDesc('date')->take(10);
        
        return view('profile.edit', [
            'user' => $user,
            'recentActivity' => $recentActivity,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
