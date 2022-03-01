<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuidanceReportController;
use App\Http\Controllers\LoginController;

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
        Route::post('/update/{stat}', [GuidanceReportController::class, 'update'])->name('reports.update');
        Route::get('/delete/{stat}', [GuidanceReportController::class, 'destroy'])->name('reports.destroy');
        Route::get('/guidance-reports', [GuidanceReportController::class, 'report'])->name('reports.guidance-reports');
        Route::post('/guidance-reports', [GuidanceReportController::class, 'getDataByDate'])->name('reports.guidance-reports');

    });

});

// unsecure routes
Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});


    
