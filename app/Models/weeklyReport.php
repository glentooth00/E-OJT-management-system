<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyReport extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'weekly_reports';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'student_id', 'week_number', 'activity_description', 'file_path',
    ];

    protected $casts = [
        'photos' => 'array',
    ];
    

    // Define relationships
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Accessor for images attribute (assuming file_path stores JSON data)
    public function getImagesAttribute()
    {
        return json_decode($this->file_path, true);
    }
}
