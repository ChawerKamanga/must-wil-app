<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SliderScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'scores',
        'student_id',
        'assesor_id',
        'evaluation_id'
    ];

    public static function calculatePercentage($scoreString)
    {
        dd('I am here');
        $scores = explode(', ', $scoreString);
        $sum = array_reduce($scores, function ($carry, $score) {
            return $carry + (float) $score;
        }, 0);
        $percentage = ($sum / 60) * 100;
        return $percentage;
    }

    public static function getAveragePercentage($studentId, $evaluationId)
    {
        $scores = DB::table('slider_scores')
            ->where('student_id', $studentId)
            ->where('evaluation_id', $evaluationId)
            ->pluck('scores')
            ->map(function ($scoreString) {
                return SliderScore::calculatePercentage($scoreString);
            });

        $average = $scores->avg();
        $roundedAverage = round($average, 0);

        return $roundedAverage;
    }
}