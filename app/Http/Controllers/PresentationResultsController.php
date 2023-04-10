<?php

namespace App\Http\Controllers;

use App\Models\PresentationScores;
use Illuminate\Http\Request;

class PresentationResultsController extends Controller
{
    public function store(Request $request)
    {
        // validate the incoming request data
        $validatedData = $request->validate([
            'scores' => 'required|string',
            'student_id' => 'required|integer',
            'assesor_id' => 'required|integer',
        ]);

        // create a new PresentationScores instance with the validated data
        $scores = new PresentationScores([
            'scores' => $validatedData['scores'],
            'student_id' => $validatedData['student_id'],
            'assesor_id' => $validatedData['assesor_id'],
        ]);

        // save the new PresentationScores instance to the database
        $scores->save();

        // return a response indicating success
        return response()->json(['message' => 'Presentation scores saved successfully'], 200);
    }
}