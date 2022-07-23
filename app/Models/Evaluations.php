<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    use HasFactory;

    public function assessment()
    {
        return $this->belongsTo(Assessments::class);   
    }

    public function questions()
    {
        return $this->hasMany(Questions::class);
    }
}
