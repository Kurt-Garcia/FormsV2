<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name', 
        'reimbursement_date', 
        'expense_type', 
        'amount', 
        'description', 
        'status_approval', 
        'admin_remarks', 
        'approved_by', 
        'approved_at'
    ];

    protected $casts = [
        'reimbursement_date' => 'date',
        'approved_at' => 'datetime',
        'amount' => 'decimal:2',
    ];

    /**
     * Get the admin who approved this record
     */
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
