<?php

namespace App\Http\Controllers;

use App\Models\SliderScore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScoresController extends Controller
{
    public function activityScoreStore(Request $request, $id)
    {
        $assesor_id = Auth::id();
        $student_id = User::findOrFail($id)->id;

        $scores = $request->input('scores');

        // Define the evaluation IDs
        $evaluation_ids = [3, 4];

        // Store the scores in the database using the SliderScore model
        foreach ($evaluation_ids as $evaluation_id) {
            $score = new SliderScore([
                'scores' => $request->input($evaluation_id == 3 ? 'report_score' : 'activity_log_score'),
                'student_id' => $student_id,
                'assesor_id' => $assesor_id,
                'evaluation_id' => $evaluation_id,
            ]);
            $score->save();
        }

        return redirect()
            ->back()
            ->with('message', 'Results updated successfully');
    }
}