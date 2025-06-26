<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name', 
        'attendance_date', 
        'status', 
        'status_approval', 
        'admin_remarks', 
        'approved_by', 
        'approved_at'
    ];

    protected $casts = [
        'attendance_date' => 'date',
        'approved_at' => 'datetime',
    ];

    /**
     * Get the admin who approved this record
     */
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
