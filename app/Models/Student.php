<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $guarded = [];    

    public function weeklyReports()
    {
        return $this->hasMany(weeklyReport::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
