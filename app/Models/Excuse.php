<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excuse extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name', 
        'excuse_date', 
        'kind_of_excuse', 
        'reason', 
        'status_approval', 
        'admin_remarks', 
        'approved_by', 
        'approved_at'
    ];

    protected $casts = [
        'excuse_date' => 'date',
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
