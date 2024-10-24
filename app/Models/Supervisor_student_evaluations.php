<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor_student_evaluations extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the default
    protected $table = 'supervisor_student_evaluations';

    // Define the fillable fields
    protected $guarded = [];
}
