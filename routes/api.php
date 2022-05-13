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
        Route::get('/', [UserController::class, 'index']);
        Route::get('/show/{user}', [UserController::class, 'show']);
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
        Route::get('/', [GuidanceReportController::class, 'index']);
        Route::get('/get-team-detail/{id}', [GuidanceReportController::class, 'getUserTeamDetails']);
        Route::post('/store', [GuidanceReportController::class, 'store']);
        Route::put('/update/{stat}', [GuidanceReportController::class, 'update']);
        Route::get('/delete/{stat}', [GuidanceReportController::class, 'destroy']);
        Route::get('/guidance-reports', [GuidanceReportController::class, 'report']);
        Route::post('/guidance-reports', [GuidanceReportController::class, 'getDataByDate']);
        Route::get('/export-guidance-reports', [GuidanceReportController::class, 'export']);
        Route::post('/import-guidance-report', [GuidanceReportController::class, 'import']);
    });
});
