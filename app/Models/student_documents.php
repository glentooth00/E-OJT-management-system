<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_documents extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'good_moral', 
        'endorsement_letter', 
        'letter_of_consent',
    ];
}
