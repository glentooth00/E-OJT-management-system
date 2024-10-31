<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

// Course.php model
public function department()
{
    return $this->belongsTo(Department::class, 'department_id'); // Adjust if necessary
}

    
    
    
}
