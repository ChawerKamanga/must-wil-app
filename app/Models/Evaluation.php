<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);   
    }

    public function questions()
    {
        return $this->hasMany(Questions::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
