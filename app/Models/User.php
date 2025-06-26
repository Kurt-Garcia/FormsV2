<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is regular user
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    /**
     * Get all attendance records for this user
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_name', 'name');
    }

    /**
     * Get all itinerary records for this user
     */
    public function itineraries()
    {
        return $this->hasMany(Itinerary::class, 'employee_name', 'name');
    }

    /**
     * Get all reimbursement records for this user
     */
    public function reimbursements()
    {
        return $this->hasMany(Reimbursement::class, 'employee_name', 'name');
    }

    /**
     * Get all gate pass records for this user
     */
    public function gatePasses()
    {
        return $this->hasMany(GatePass::class, 'employee_name', 'name');
    }

    /**
     * Get all excuse records for this user
     */
    public function excuses()
    {
        return $this->hasMany(Excuse::class, 'employee_name', 'name');
    }

    /**
     * Get user's form statistics
     */
    public function getFormStatsAttribute()
    {
        return [
            'attendance' => $this->attendances()->count(),
            'itineraries' => $this->itineraries()->count(),
            'reimbursements' => $this->reimbursements()->count(),
            'gate_passes' => $this->gatePasses()->count(),
            'excuses' => $this->excuses()->count(),
            'total' => $this->attendances()->count() + 
                      $this->itineraries()->count() + 
                      $this->reimbursements()->count() + 
                      $this->gatePasses()->count() + 
                      $this->excuses()->count(),
        ];
    }

    /**
     * Get pending forms count
     */
    public function getPendingFormsAttribute()
    {
        return $this->attendances()->where('status_approval', 'pending')->count() +
               $this->itineraries()->where('status_approval', 'pending')->count() +
               $this->reimbursements()->where('status_approval', 'pending')->count() +
               $this->gatePasses()->where('status_approval', 'pending')->count() +
               $this->excuses()->where('status_approval', 'pending')->count();
    }

    /**
     * Get approved forms count
     */
    public function getApprovedFormsAttribute()
    {
        return $this->attendances()->where('status_approval', 'approved')->count() +
               $this->itineraries()->where('status_approval', 'approved')->count() +
               $this->reimbursements()->where('status_approval', 'approved')->count() +
               $this->gatePasses()->where('status_approval', 'approved')->count() +
               $this->excuses()->where('status_approval', 'approved')->count();
    }
}
