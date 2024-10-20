<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    const STATUS_PENDING = 'Pending';

    const STATUS_APPROVED = 'Approved';

    const STATUS_LOGGED_IN = 'Logged-in';

    const STATUS_LOGGED_OUT = 'Logged-Out';
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
