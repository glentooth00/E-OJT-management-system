<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'Attendance1',
        'Attendance2',
        'Attendance3',
        'activitypoints1',
        'activitypoints2',
        'activitypoints3',
    ];
}
