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
            return Inertia::render('StudentDashboard');
        }else {
            return Inertia::render('Dashboard');
        }
    }
}
