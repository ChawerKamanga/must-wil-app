<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Ramsey\Collection\Exception\InvalidArgumentException;


class SliderScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'scores',
        'student_id',
        'assesor_id',
        'evaluation_id'
    ];

    public static function calculatePercentage($scoreString, $evaluationId)
    {
        $scores = explode(', ', $scoreString);
        $sum = array_reduce($scores, function ($carry, $score) {
            return $carry + (float) $score;
        }, 0);

        if ($evaluationId == 1) {
            $divisor = 60;
        } else if ($evaluationId == 2) {
            $divisor = 25;
        } else {
            throw new InvalidArgumentException('Invalid evaluation ID.');
        }

        $percentage = ($sum / $divisor) * 100;
        return $percentage;
    }


    public static function getAveragePercentage($studentId, $evaluationId)
    {
        if (!$evaluationId) {
            throw new InvalidArgumentException('Evaluation ID must be provided.');
        }

        $scores = DB::table('slider_scores')
            ->where('student_id', $studentId)
            ->where('evaluation_id', $evaluationId)
            ->pluck('scores')
            ->map(function ($scoreString) use ($evaluationId) {
                return SliderScore::calculatePercentage($scoreString, $evaluationId);
            });

        $average = $scores->avg();
        $roundedAverage = round($average, 0);

        return $roundedAverage;
    }

    public static function getLatestScoreByStudentIdAndEvaluationId($studentId, $evaluationId)
    {
        $latestScore = self::where('student_id', $studentId)
            ->where('evaluation_id', $evaluationId)
            ->orderBy('created_at', 'desc')
            ->first();

        return $latestScore ? $latestScore->scores : null;

    }
}