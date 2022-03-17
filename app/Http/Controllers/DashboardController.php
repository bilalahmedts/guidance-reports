<?php

namespace App\Http\Controllers;
use App\Models\GuidanceReport;
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

        $team_one_months = GuidanceReport::select(DB::raw('MONTHNAME(created_at) as month'))
        ->whereHas('user', function($query){
            $query->where('team_id',1);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('month')->toArray();

        $team_one_data_monthly = GuidanceReport::select(DB::raw('SUM(rea_sign_up) as rea'))->whereHas('user', function($query){
            $query->where('team_id',1);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('rea')->toArray();

        $team_two_dates = GuidanceReport::select(DB::raw('Date(created_at) as date'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('date');

        $team_two_online_pq_transfer_per_day = GuidanceReport::select(DB::raw('SUM(transfer_per_day) as transfer'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',1)
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('transfer');

        $team_two_online_pq_call_per_day = GuidanceReport::select(DB::raw('SUM(call_per_day) as calls'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',1)
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('calls');

        $team_two_fallout_transfer_per_day = GuidanceReport::select(DB::raw('SUM(transfer_per_day) as transfer'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',2)
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('transfer');

        $team_two_fallout_call_per_day = GuidanceReport::select(DB::raw('SUM(call_per_day) as calls'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',2)
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('calls');

        $team_two_others_transfer_per_day = GuidanceReport::select(DB::raw('SUM(transfer_per_day) as transfer'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',3)
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('transfer');

        $team_two_others_call_per_day = GuidanceReport::select(DB::raw('SUM(call_per_day) as calls'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',3)
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->pluck('calls');

        $team_two_months = GuidanceReport::select(DB::raw('MONTHNAME(created_at) as month'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('month')->toArray();

        $team_two_online_pq_transfer_per_day_monthly = GuidanceReport::select(DB::raw('SUM(transfer_per_day) as transfer'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',1)
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('transfer')->toArray();

        $team_two_online_pq_call_per_day_monthly = GuidanceReport::select(DB::raw('SUM(call_per_day) as calls'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',1)
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('calls')->toArray();

        $team_two_fallout_transfer_per_day_monthly = GuidanceReport::select(DB::raw('SUM(transfer_per_day) as transfer'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',2)
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('transfer')->toArray();

        $team_two_fallout_call_per_day_monthly = GuidanceReport::select(DB::raw('SUM(call_per_day) as calls'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',2)
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('calls')->toArray();

        $team_two_others_transfer_per_day_monthly = GuidanceReport::select(DB::raw('SUM(transfer_per_day) as transfer'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',3)
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('transfer')->toArray();

        $team_two_others_call_per_day_monthly = GuidanceReport::select(DB::raw('SUM(call_per_day) as calls'))
        ->whereHas('user', function($query){
            $query->where('team_id',2);
        })->where('categories_id',3)
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('calls')->toArray();
        
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

        $team_three_months = GuidanceReport::select(DB::raw('MONTHNAME(created_at) as month'))
        ->whereHas('user', function($query){
            $query->where('team_id',3);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('month')->toArray();

        $team_three_tbd_assigned_data_monthly = GuidanceReport::select(DB::raw('SUM(tbd_assigned) as tbd'))->whereHas('user', function($query){
            $query->where('team_id',3);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('tbd')->toArray();

        $team_three_no_of_matches_data_monthly = GuidanceReport::select(DB::raw('SUM(no_of_matches) as matches'))->whereHas('user', function($query){
            $query->where('team_id',3);
        })->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy('created_at','asc')
        ->pluck('matches')->toArray();

        return view('dashboard', compact('team_one_dates','team_one_data','team_one_months','team_one_data_monthly',
                    'team_two_dates','team_two_online_pq_transfer_per_day','team_two_online_pq_call_per_day',
                    'team_two_fallout_transfer_per_day','team_two_fallout_call_per_day',
                    'team_two_others_transfer_per_day','team_two_others_call_per_day','team_two_months',
                    'team_two_online_pq_transfer_per_day_monthly','team_two_online_pq_call_per_day_monthly',
                    'team_two_fallout_transfer_per_day_monthly','team_two_fallout_call_per_day_monthly',
                    'team_two_others_transfer_per_day_monthly','team_two_others_call_per_day_monthly',
                    'team_three_dates','team_three_tbd_assigned_data','team_three_no_of_matches_data','team_three_months',
                    'team_three_tbd_assigned_data_monthly','team_three_no_of_matches_data_monthly'));
    }

}
