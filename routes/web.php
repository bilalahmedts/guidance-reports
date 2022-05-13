<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuidanceReportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\TeamController;
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
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('reports')->group(function () {
        Route::get('/', [GuidanceReportController::class, 'index'])->name('reports.index');
        Route::get('/create', [GuidanceReportController::class, 'create'])->name('reports.create');
        Route::get('/get-team-detail/{id}', [GuidanceReportController::class, 'getUserTeamDetails'])->name('reports.get-team-detail');
        Route::post('/store', [GuidanceReportController::class, 'store'])->name('reports.store');
        Route::get('/edit/{stat}', [GuidanceReportController::class, 'edit'])->name('reports.edit');
        Route::put('/update/{stat}', [GuidanceReportController::class, 'update'])->name('reports.update');
        Route::get('/delete/{stat}', [GuidanceReportController::class, 'destroy'])->name('reports.destroy');
        Route::get('/guidance-reports', [GuidanceReportController::class, 'report'])->name('reports.guidance-reports');
        Route::post('/guidance-reports', [GuidanceReportController::class, 'getDataByDate'])->name('reports.guidance-reports');
        Route::get('/export-guidance-reports', [GuidanceReportController::class, 'export'])->name('reports.guidance-report-table');
        Route::get('/import-guidance-report-form', [GuidanceReportController::class, 'importForm'])->name('reports.import-form');
        Route::post('/import-guidance-report', [GuidanceReportController::class, 'import'])->name('reports.import');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{user}', [UserController::class, 'destroy'])->name('users.delete');
    });
    
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/update/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('/delete/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

    Route::prefix('teams')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('teams.index');
        Route::get('/create', [TeamController::class, 'create'])->name('teams.create');
        Route::post('/store', [TeamController::class, 'store'])->name('teams.store');
        Route::get('/edit/{team}', [TeamController::class, 'edit'])->name('teams.edit');
        Route::put('/edit/{team}', [TeamController::class, 'update'])->name('teams.update');
        Route::get('/delete/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
    });

});

// unsecure routes
Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});


    
