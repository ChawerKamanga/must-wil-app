<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // select all users whose organization id is same as authenticated user 
        // and role id is equal to 3 
        if (Auth::user()->role_id == 4) {
            return Inertia::render('StudentDashboard', [
                'authUserOrg' => Auth::user()->organization,
                'authUserOrgDistrict' =>  Auth::user()->organization->district,
                'noOfStudents' => Auth::user()->organization->users()->where('role_id', 4)->count(),
                'industrialSupervisor' => User::where([
                    ['organization_id', Auth::user()->organization_id],
                    ['role_id', 3],
                ])->first(),

            ]);
        } else {
            return Inertia::render('Dashboard');
        }
    }
}
