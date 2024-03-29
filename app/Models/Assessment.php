<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    public function assessmentType()
    {
        return $this->belongsTo(AssesmentType::class, 'assesment_type_id');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluations::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
