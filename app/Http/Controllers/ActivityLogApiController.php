<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityLogApiController extends Controller
{
    public function getActivities($authUserId)
    {
        // Retrieve the authenticated user's organization ID
        $organizationId = User::findOrFail($authUserId)->organization_id;

        // Use the organization ID to retrieve all the users that belong to that organization
        $userIds = User::where('organization_id', $organizationId)->pluck('id');

        // Use the user IDs to retrieve all the activity logs that belong to those users
        $activityLogs = ActivityLog::whereIn('user_id', $userIds)->where('is_approved', 0)->get();

        return $activityLogs;
    }
}