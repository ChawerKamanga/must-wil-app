<?php

use App\Http\Controllers\AcademicSupervisorsController;
use App\Http\Controllers\DashboardController;
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
    Route::resource('roles', RolesController::class)->except(['edit', 'show']);
    Route::get('roles/edit/{role:slug}', [RolesController::class, 'edit'])->name('roles.edit');
    Route::resource('organizations', RolesController::class)->except(['edit', 'show']);
    Route::get('roles/edit/{organizations:slug}', [RolesController::class, 'edit'])->name('organizations.edit');
    Route::resource('programmes', ProgrammesController::class)->except(['edit', 'show']);
    Route::get('programmes/edit/{programme:code}', [ProgrammesController::class, 'edit'])->name('programmes.edit');
    Route::resource('academic-supervisors', AcademicSupervisorsController::class)->except(['edit', 'show']);
    Route::get('academic-supervisors/edit/{academic_supervisors:slug}', [AcademicSupervisorsController::class, 'edit'])->name('academic-supervisors.edit');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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
