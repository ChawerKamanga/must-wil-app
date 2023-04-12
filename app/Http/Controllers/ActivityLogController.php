<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'week_number' => 'required|integer',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'days_present' => 'required|integer',
            'days_absent' => 'required|integer',
            'summary' => 'required|string',
        ]);

        ActivityLog::create([
            'week_number' => $validatedData['week_number'],
            'from_date' => $validatedData['from_date'],
            'to_date' => $validatedData['to_date'],
            'days_present' => $validatedData['days_present'],
            'days_absent' => $validatedData['days_absent'],
            'summary' => $validatedData['summary'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Activity log was successfully created.');
    }







}