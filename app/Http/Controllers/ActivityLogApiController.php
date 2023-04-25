<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityLogResource;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityLogApiController extends Controller
{
    public function getActivities($authUserId)
    {
        $user = User::findOrFail($authUserId);
        $organizationId = $user->organization_id;

        $activityLogs = DB::table('activity_logs')
            ->join('users', 'activity_logs.user_id', '=', 'users.id')
            ->where('users.organization_id', '=', $organizationId)
            ->where('activity_logs.is_approved', '=', 0)
            ->get();
        // $activityLogs = DB::table('activity_logs')
        //     ->select('activity_logs.id', 'week_number', 'is_approved', 'from_date', 'to_date', 'days_present', 'days_absent', 'user_id', 'summary', 'activity_logs.created_at', 'activity_logs.updated_at as activity_logs_updated_at')
        //     ->join('users', 'activity_logs.user_id', '=', 'users.id')
        //     ->where('users.organization_id', '=', $organizationId)
        //     ->where('activity_logs.is_approved', '=', 0)
        //     ->get();

        return $activityLogs;

        // return ActivityLogResource::collection($activityLogs);
    }

    public function updateActivityLog($activityId)
    {
        $activityLog = ActivityLog::findOrFail($activityId);
        $activityLog->is_approved = 1;
        $activityLog->save();
        return response()->json(['message' => 'Activity log updated successfully']);
    }

}