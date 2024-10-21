<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_documents extends Model
{
    use HasFactory;

    protected $fillable = ['file_name', 'content', 'created_at'];
    protected $guarded = [];
}
