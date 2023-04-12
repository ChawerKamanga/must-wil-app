<?php

use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\EvaluationsAPIController;
use App\Http\Controllers\InternsAPIController;
use App\Http\Controllers\OrganizationApiController;
use App\Http\Controllers\PresentationResultsController;
use App\Http\Controllers\ProgrammesAPIController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::get('user', [UserController::class, 'index']);
    Route::get('organizations', [OrganizationApiController::class, 'index']);
    Route::get('organization/{organization}', [OrganizationApiController::class, 'show']);
    Route::get('organization/{organization}', [OrganizationApiController::class, 'show']);
    Route::get('programmes', [ProgrammesAPIController::class, 'index']);
    Route::get("interns/{pgId?}/search/{name?}", [InternsAPIController::class, 'search']);
    Route::get("interns/{pgId?}", [InternsAPIController::class, 'index']);
    Route::get('presentation-evaluations', [EvaluationsAPIController::class, 'index']);
    Route::get('overall-industrial-supervisor-evaluations', [EvaluationsAPIController::class, 'getOverallIndustrialSupervisorEvaluation']);
    Route::get('interns-org/{selectedUserId}', [InternsAPIController::class, 'getUsersInOrganization']);
    Route::post('/presentation-scores', [PresentationResultsController::class, 'store']);
});


Route::prefix('v1')->group(function () {
    Route::post('login', [APIAuthController::class, 'login']);
});

// 