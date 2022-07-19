<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssesmentType extends Model
{
    use HasFactory;

    public function assessments()
    {
        return $this->hasMany(Assessments::class);
    }
}
