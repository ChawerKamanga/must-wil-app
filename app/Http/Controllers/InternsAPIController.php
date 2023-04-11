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
        // Retrieve the user object for the selected user, or throw a 404 exception if not found
        $selectedUser = User::findOrFail($selectedUserId);

        // Retrieve the organization object for the selected user
        $organization = $selectedUser->organization;


        // Retrieve all the users in the organization with role_id = 4
        $usersInOrganization = $organization->users()->where('role_id', 4)->get();

        return InternResource::collection($usersInOrganization);
    }


}