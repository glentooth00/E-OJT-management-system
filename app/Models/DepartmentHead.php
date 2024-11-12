<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class DepartmentHead extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'first_name',
    //     'middle_name',
    //     'last_name',
    //     'email',
    //     'password',
    //     'department',
    // ];

    // DepartmentHead.php (Model)
public function course()
{
    return $this->belongsTo(Course::class);
}

// In DepartmentHead model
public function department()
{
    return $this->belongsTo(Department::class);
}


}

