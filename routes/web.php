<?php

use App\Http\Controllers\AcademicSupervisorsController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\AssessmentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationsController;
use App\Http\Controllers\IndustrialSupervisorController;
use App\Http\Controllers\InternsController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProgrammesController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StudentRegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::resource('assessments', AssessmentsController::class)->except(['edit', 'show']);
    Route::get('assessments/{assessments:slug}', [AssessmentsController::class, 'show'])->name('assessments.show');
    Route::get('assessments/edit/{assessments:slug}', [AssessmentsController::class, 'edit'])->name('assessments.edit');
    Route::get('assessments/{evaluation}/interns/{user}', [AssessmentsController::class, 'showQuestions'])->name('assessment.student.show');
    Route::resource('academic-supervisors', AcademicSupervisorsController::class)->except(['edit', 'show']);
    Route::get('academic-supervisors/edit/{academic_supervisors:slug}', [AcademicSupervisorsController::class, 'edit'])->name('academic-supervisors.edit');
    Route::get('assessments/{assessments:slug}/{user:slug}', [AssessmentsController::class, 'showQuestions'])->name('assessments.questions');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('evaluations', EvaluationsController::class)->except(['edit', 'show']);
    Route::get('evaluations/{evaluation:slug}', [EvaluationsController::class, 'show'])->name('evaluations.show');
    Route::get('evaluations/edit/{evaluations:slug}', [EvaluationsController::class, 'edit'])->name('evaluations.edit');
    Route::resource('industrial-supervisors', IndustrialSupervisorController::class)->except(['edit', 'show']);
    Route::get('industrial-supervisors/edit/{industrial_supervisors:slug}', [IndustrialSupervisorController::class, 'edit'])->name('industrial-supervisors.edit');
    Route::resource('interns', InternsController::class)->except(['edit', 'show']);
    Route::get('interns/activity-log', [DashboardController::class, 'activityLog'])->name('interns.activity.log');
    Route::get('interns/report', [DashboardController::class, 'showInternReport'])->name('interns.report');
    Route::post('interns/report', [DashboardController::class, 'storeInternReport'])->name('interns.report.store');
    Route::get('users/edit/{user:slug}', [InternsController::class, 'edit'])->name('interns.edit');
    Route::get('interns/{user:slug}', [InternsController::class, 'show'])->name('interns.show');
    Route::get('interns/{user:slug}/activityLog', [InternsController::class, 'showInternActivities'])->name('interns.activities');
    Route::resource('organizations', OrganizationController::class)->except(['edit', 'show']);
    Route::get('organizations/edit/{organization:slug}', [OrganizationController::class, 'edit'])->name('organizations.edit');
    Route::get('organizations/{organization:slug}', [OrganizationController::class, 'show'])->name('organizations.show');
    Route::resource('programmes', ProgrammesController::class)->except(['edit', 'show']);
    Route::get('programmes/edit/{programme:code}', [ProgrammesController::class, 'edit'])->name('programmes.edit');
    Route::resource('roles', RolesController::class)->except(['edit', 'show']);
    Route::get('roles/edit/{role:slug}', [RolesController::class, 'edit'])->name('roles.edit');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('/activity-log', [ActivityLogController::class, 'store'])->name('activity_log.store');
    Route::post('/report-score/{user}', [ScoresController::class, 'reportScoreStore'])->name('report_score.store');
    Route::post('/activity-score/{user}', [ScoresController::class, 'activityScoreStore'])->name('activity_score.store');
});

Route::middleware(['guest'])->group(function () {
    Route::get('student-register', [StudentRegisterController::class, 'create'])->name('register.create');
    Route::post('/student-register/first-step', [StudentRegisterController::class, 'firstStep'])->name('student-register.step.first');
    Route::post('/student-register/second-step', [StudentRegisterController::class, 'secondStep'])->name('student-register.step.second');
    Route::post('/student-register', [StudentRegisterController::class, 'register'])->name('student.register');
});


Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

require __DIR__ . '/auth.php';