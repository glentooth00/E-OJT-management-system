<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Image;


class weeklyReport extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getImagesAttribute()
    {
        // Assuming 'file_path' is the column where image file paths are stored
        return json_decode($this->file_path, true);
    }

}
