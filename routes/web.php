<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuidanceReportController;
/* use App\Http\Controllers\LoginController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\GuidanceReportController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\VoiceEvaluation\VoiceEvaluationController;
use App\Http\Controllers\VoiceEvaluation\CategoryController;
use App\Http\Controllers\VoiceEvaluation\DatapointController; */
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

    Route::get('/', [GuidanceReportController::class, 'index'])->name('index');
    Route::get('/create', [GuidanceReportController::class, 'create'])->name('create');
    Route::get('/get-team-detail/{id}', [GuidanceReportController::class, 'getUserTeamDetails'])->name('get-team-detail');
    Route::post('/store', [GuidanceReportController::class, 'store'])->name('store');
    Route::get('/export', [GuidanceReportController::class, 'export'])->name('export');
