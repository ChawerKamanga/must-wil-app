<?php

namespace App\Http\Controllers;

use App\Http\Resources\InternResource;
use App\Models\User;
use Illuminate\Http\Request;

class InternsAPIController extends Controller
{
    public function index($pgId)
    {
        $interns = User::where([
            ['role_id', 4],
            ['is_allocated', 1],
            ['programme_id', $pgId],
        ])->get();

        return InternResource::collection($interns);
    }

    public function search($pgId, $name = null)
    {
        if ($name) {
            $interns = User::where([
                ['role_id', 4],
                ['is_allocated', 1],
                ['programme_id', $pgId],
                ['name', 'like', '%' . $name . '%']
            ])->get();
        } else {
            $interns = User::where([
                ['role_id', 4],
                ['is_allocated', 1],
                ['programme_id', $pgId],
            ])->get();
        }

        return InternResource::collection($interns);
    }

    public function getUsersInOrganization($selectedUserId)
    {
        $selectedUser = User::findOrFail($selectedUserId);

        $organization = $selectedUser->organization;


        $usersInOrganization = $organization->users()->where('role_id', 4)->get();

        return InternResource::collection($usersInOrganization);
    }


}