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
            ->select('activity_logs.id', 'activity_logs.week_number', 'activity_logs.is_approved', 'activity_logs.from_date', 'activity_logs.to_date', 'activity_logs.days_present', 'activity_logs.days_absent', 'activity_logs.summary', 'activity_logs.created_at', 'users.name', 'users.profile_img_url')
            ->get();

        return ActivityLogResource::collection($activityLogs);
    }

    public function updateActivityLog($activityId)
    {
        $activityLog = ActivityLog::findOrFail($activityId);
        $activityLog->is_approved = 1;
        $activityLog->save();
        return response()->json(['message' => 'Activity log updated successfully']);
    }

}