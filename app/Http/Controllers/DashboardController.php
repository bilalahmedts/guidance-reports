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
        })->pluck('date');

        $team_two_dates = GuidanceReport::select(DB::raw('Date(created_at) as date'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->pluck('date');
        
        $team_one_data = GuidanceReport::select('rea_sign_up')->whereHas('user', function($query){
            $query->where('team_id',1);
        })->pluck('rea_sign_up');

        $team_three_dates = GuidanceReport::select(DB::raw('Date(created_at) as date'))
        ->whereHas('user', function($query){
            $query->where('team_id',3);
        })->pluck('date');
        $team_three_tbd_assigned_data = GuidanceReport::select('tbd_assigned')->whereHas('user', function($query){
            $query->where('team_id',3);
        })->pluck('tbd_assigned');
        $team_three_no_of_matches_data = GuidanceReport::select('no_of_matches')->whereHas('user', function($query){
            $query->where('team_id',3);
        })->pluck('no_of_matches');

        return view('dashboard', compact('team_one_dates','team_one_data','team_two_dates','team_three_dates','team_three_tbd_assigned_data','team_three_no_of_matches_data'));
    }

}
