<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
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
            } else {
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
        return Inertia::render('Students/Report', [
            'report' => Evaluation::where('assessment_id',3)->get(),
        ]);
    }

    public function storeInternReport(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:1024',
        ]);

        $user = new User();

        if ($request->hasFile('file')) {
            $file = $request->file('organization_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/student-reports/', $filename);
            $user->report_name = $filename;
            $user->report_url = '/uploads/student-reports/' . $filename;

            $user->save();
            return redirect()->back()->with('message',  'Report uploaded successfully');
        }else {
            return back()->with('message', 'Report upload unsucessfull');
        }
    }
}
