<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationCriteria extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scores()
    {
        return $this->hasMany(EvaluationScore::class);
    }
}
