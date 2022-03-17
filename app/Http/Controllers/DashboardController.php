<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Models\GuidanceReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $team_one_dates = GuidanceReport::select(DB::raw('Date(created_at) as date'))
        ->whereHas('user', function($query){
            $query->where('team_id',1);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('date');

        $team_one_data = GuidanceReport::select(DB::raw('SUM(rea_sign_up) as rea'))->whereHas('user', function($query){
            $query->where('team_id',1);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('rea');

        $team_three_dates = GuidanceReport::select(DB::raw('Date(created_at) as date'))
        ->whereHas('user', function($query){
            $query->where('team_id',3);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('date');
        $team_three_tbd_assigned_data = GuidanceReport::select(DB::raw('SUM(tbd_assigned) as tbd'))->whereHas('user', function($query){
            $query->where('team_id',3);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('tbd');
        $team_three_no_of_matches_data = GuidanceReport::select(DB::raw('SUM(no_of_matches) as matches'))->whereHas('user', function($query){
            $query->where('team_id',3);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('matches');

        return view('dashboard', compact('team_one_dates','team_one_data','team_three_dates','team_three_tbd_assigned_data','team_three_no_of_matches_data'));
    }

}
