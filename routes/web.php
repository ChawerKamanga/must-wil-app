<?php

use App\Http\Controllers\AcademicSupervisorsController;
use App\Http\Controllers\AssessmentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationsController;
use App\Http\Controllers\IndustrialSupervisorController;
use App\Http\Controllers\InternsController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProgrammesController;
use App\Http\Controllers\RolesController;
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
    Route::resource('academic-supervisors', AcademicSupervisorsController::class)->except(['edit', 'show']);
    Route::get('academic-supervisors/edit/{academic_supervisors:slug}', [AcademicSupervisorsController::class, 'edit'])->name('academic-supervisors.edit');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('evaluations', EvaluationsController::class)->except(['edit', 'show']);
    Route::get('evaluations/{evaluations:slug}', [EvaluationsController::class, 'show'])->name('evaluations.show');
    Route::get('evaluations/edit/{evaluations:slug}', [EvaluationsController::class, 'edit'])->name('evaluations.edit');
    Route::resource('industrial-supervisors', IndustrialSupervisorController::class)->except(['edit', 'show']);
    Route::get('industrial-supervisors/edit/{industrial_supervisors:slug}', [IndustrialSupervisorController::class, 'edit'])->name('industrial-supervisors.edit');
    Route::resource('interns', InternsController::class)->except(['edit', 'show']);
    Route::get('interns/edit/{interns:slug}', [InternsController::class, 'edit'])->name('interns.edit');
    Route::resource('organizations', OrganizationController::class)->except(['edit', 'show']);
    Route::get('organizations/edit/{organization:slug}', [OrganizationController::class, 'edit'])->name('organizations.edit');
    Route::resource('programmes', ProgrammesController::class)->except(['edit', 'show']);
    Route::get('programmes/edit/{programme:code}', [ProgrammesController::class, 'edit'])->name('programmes.edit');
    Route::resource('roles', RolesController::class)->except(['edit', 'show']);
    Route::get('roles/edit/{role:slug}', [RolesController::class, 'edit'])->name('roles.edit');
});



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


require __DIR__.'/auth.php';
