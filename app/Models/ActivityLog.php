<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'week_number',
        'from_date',
        'to_date',
        'days_present',
        'days_absent',
        'summary',
        'user_id',
        'is_approved'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}