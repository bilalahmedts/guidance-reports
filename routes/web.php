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

Route::middleware('auth')->get('/', function () {
    return view('welcome');
});


// secured routes
/* Route::middleware('auth')->group(function () { */

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
/* Route::get('logout', [LoginController::class, 'logout'])->name('logout'); */
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('guidance-reports')->group(function () {
    Route::get('/', [GuidanceReportController::class, 'index'])->name('guidance-reports.index');
    Route::get('/get-team-detail/{id}', [GuidanceReportController::class, 'getTeamDetail'])->name('guidance-reports.get-team-detail');
    Route::get('/create', [GuidanceReportController::class, 'create'])->name('guidance-reports.create');
    Route::post('/store', [GuidanceReportController::class, 'store'])->name('guidance-reports.store');
    /* Route::get('/edit/{campaign}', [GuidanceReportController::class, 'edit'])->name('campaigns.edit');
    Route::put('/edit/{campaign}', [GuidanceReportController::class, 'update'])->name('campaigns.update');
    Route::get('/delete/{campaign}', [GuidanceReportController::class, 'destroy'])->name('campaigns.destroy'); */
});

/* }); */

// unsecure routes
/* Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
}); */
