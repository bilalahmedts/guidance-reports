<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\GuidanceReport;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()  
    {
        return view('dashboard');
    }

    public function teamOneGraph()
    {
        $datas = GuidanceReport::select('rea_sign_up')->whereHas('user', function($query){
            $query->where('team_id',1);
        })->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Day(created_at)"))
        ->pluck('rea_sign_up');
        $months = GuidanceReport::select(DB::raw('Month(created_at) as month'))->whereHas('user', function($query){
            $query->where('team_id',1);
        })->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');
        return view('dashboard', compact('datas','months'));
    }

}
