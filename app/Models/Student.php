<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
        'id_number',
        'course',
        'department',
        'address',
        'contact_number',
        'dob',
        'sex',
        'id_attachment',
        'application_status',
        'role',
        'school_year'
    ];

    public function weeklyReports()
    {
        return $this->hasMany(WeeklyReport::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
