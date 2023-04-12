<?php

namespace App\Http\Controllers;

use App\Models\SliderScore;
use Illuminate\Http\Request;

class SliderScoreController extends Controller
{
    public function store(Request $request)
    {
        // validate the incoming request data
        $validatedData = $request->validate([
            'scores' => 'required|string',
            'student_id' => 'required|integer',
            'assesor_id' => 'required|integer',
            'evaluation_id' => 'required|integer',
        ]);

        // create a new PresentationScores instance with the validated data
        $scores = new SliderScore([
            'scores' => $validatedData['scores'],
            'student_id' => $validatedData['student_id'],
            'assesor_id' => $validatedData['assesor_id'],
            'evaluation_id' => $validatedData['evaluation_id'],

        ]);

        // save the new PresentationScores instance to the database
        $scores->save();

        // return a response indicating success
        return response()->json(['message' => 'Scores saved successfully'], 201);
    }
}