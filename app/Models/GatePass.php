<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePass extends Model
{
    use HasFactory;

    protected $fillable = ['employee_name', 'date', 'time_in', 'time_out', 'destination', 'reason'];
}
