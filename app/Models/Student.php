<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
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
