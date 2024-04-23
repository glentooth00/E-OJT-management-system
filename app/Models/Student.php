<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
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
        'role'
    ];

 
}
