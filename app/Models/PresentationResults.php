<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentationResults extends Model
{
    use HasFactory;

    protected $fillable = [
        'scores',
        'student_id',
        'assesor_id',
    ];
}