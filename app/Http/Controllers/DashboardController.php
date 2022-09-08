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
        if (Auth::user()->role_id == 4) {
            if (Auth::user()->is_allocated == 1) {
                return Inertia::render('StudentDashboard', [
                    'authUserOrg' => Auth::user()->organization,
                    'authUserOrgDistrict' =>  Auth::user()->organization->district,
                    'noOfStudents' => Auth::user()->organization->users()->where('role_id', 4)->count(),
                    'industrialSupervisor' => User::where([
                        ['organization_id', Auth::user()->organization_id],
                        ['role_id', 3],
                    ])->first(),
                    'interns' => User::where([
                        ['organization_id', Auth::user()->organization_id],
                        ['role_id', 4],
                    ])->take(10)->get(),
                ]);
            }else {
                return Inertia::render('StudentDashboard');
            }
        } else {
            return Inertia::render('Dashboard');
        }
    }

    public function activityLog()
    {
        return Inertia::render('Students/ActivityLog'); 
    }   
    
    public function showInternReport()
    {
        return Inertia::render('Students/Report');    
    }
}
