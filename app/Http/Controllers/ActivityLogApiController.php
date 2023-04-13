<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActivityLogApiController extends Controller
{
    public function getActivities($authUserId)
    {
        $user = User::findOrFail($authUserId); // Get the authenticated user
        $organization = $user->organization; // Get the organization for the user


        // Get all activity logs for the organization
        $activity_logs = $organization->activity_logs()->get();

        return response()->json([
            'activity_logs' => $activity_logs
        ]);
    }
}