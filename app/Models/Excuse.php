<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excuse extends Model
{
    use HasFactory;

    protected $fillable = ['employee_name', 'excuse_date', 'kind_of_excuse', 'reason'];
}
