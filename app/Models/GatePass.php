<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePass extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name', 
        'date', 
        'time_in', 
        'time_out', 
        'destination', 
        'reason', 
        'status_approval', 
        'admin_remarks', 
        'approved_by', 
        'approved_at'
    ];

    protected $casts = [
        'date' => 'date',
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
