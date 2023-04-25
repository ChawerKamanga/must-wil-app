<?php

use App\Http\Controllers\ActivityLogApiController;
use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\EvaluationsAPIController;
use App\Http\Controllers\InternsAPIController;
use App\Http\Controllers\OrganizationApiController;
use App\Http\Controllers\ProgrammesAPIController;
use App\Http\Controllers\SliderScoreController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\FingersCrossed\ActivationStrategyInterface;

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
    Route::get('programmes', [ProgrammesAPIController::class, 'index']);
    Route::get("interns/{pgId?}/search/{name?}", [InternsAPIController::class, 'search']);
    Route::get("interns/{pgId?}", [InternsAPIController::class, 'index']);
    Route::get('presentation-evaluations', [EvaluationsAPIController::class, 'index']);
    Route::get('overall-industrial-supervisor-evaluations', [EvaluationsAPIController::class, 'getOverallIndustrialSupervisorEvaluation']);
    Route::get('interns-org/{selectedUserId}', [InternsAPIController::class, 'getUsersInOrganization']);
    Route::get('activities-log/{selectedUserId}', [ActivityLogApiController::class, 'getActivities']);
    Route::put('/activity-logs/{id}/approve', [ActivityLogApiController::class, 'updateActivityLog']);
    Route::post('/slider-scores', [SliderScoreController::class, 'store']);
    Route::get('organization/interns/{user}', [OrganizationApiController::class, 'getUsersByOrganization']);
});


Route::prefix('v1')->group(function () {
    Route::post('login', [APIAuthController::class, 'login']);
});

// 