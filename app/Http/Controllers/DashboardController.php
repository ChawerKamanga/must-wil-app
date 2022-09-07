<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 4) {
            return Inertia::render('StudentDashboard', [
                'auth.user.org.district' =>  Auth::user()->organization->district,
                'auth.user.org' => Auth::user()->organization
            ]);
        }else {
            return Inertia::render('Dashboard');
        }
    }
}
