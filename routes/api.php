<?php

use App\Http\Controllers\APIs\LoginController;
use App\Http\Controllers\APIs\Users\RoleController;
use App\Http\Controllers\APIs\Users\UserController;
use App\Http\Controllers\APIs\GuidanceReportController;
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
Route::middleware('guest')->group(function () {
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth:api')->group(function () {
    
    Route::prefix('users')->group(function () {
        Route::middleware('APIkey')->group(function () {
        Route::get('/access_key={apikey}', [UserController::class, 'index']);
        Route::get('/show/{user}/access_key={apikey}', [UserController::class, 'show']);
        });
        Route::post('/store', [UserController::class, 'store']);
        Route::put('/update/{user}', [UserController::class, 'update']);
    });
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/store', [RoleController::class, 'store']);
        Route::put('/update/{role}', [RoleController::class, 'update']);
        Route::get('/delete/{role}', [RoleController::class, 'destroy']);
    });
    Route::prefix('reports')->group(function () {
        Route::middleware('APIkey')->group(function () {
        Route::get('/access_key={apikey}', [GuidanceReportController::class, 'index']);
        Route::get('/get-team-detail/{id}/access_key={apikey}', [GuidanceReportController::class, 'getUserTeamDetails']);
        Route::post('/store/access_key={apikey}', [GuidanceReportController::class, 'store']);
        Route::put('/update/{stat}/access_key={apikey}', [GuidanceReportController::class, 'update']);
        Route::get('/delete/{stat}/access_key={apikey}', [GuidanceReportController::class, 'destroy']);
        Route::get('/guidance-reports/access_key={apikey}', [GuidanceReportController::class, 'report']);
        Route::post('/guidance-reports/access_key={apikey}', [GuidanceReportController::class, 'getDataByDate']);
        Route::get('/export-guidance-reports/access_key={apikey}', [GuidanceReportController::class, 'export']);
        Route::post('/import-guidance-report/access_key={apikey}', [GuidanceReportController::class, 'import']);
    });
    });
});

