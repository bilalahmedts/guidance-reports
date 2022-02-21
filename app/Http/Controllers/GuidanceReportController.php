<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;

use Illuminate\Http\Request;

class GuidanceReportController extends Controller
{
    public function index()
    {
        return view('guidance-reports.index');
    }

    public function create()
    {
        $users = User::all();
        return view('guidance-reports.create', compact('users'));
    }
    public function getUserTeamDetails($id)
    {
        $user_team_details = User::findOrFail($id);
        $data = [
            'team_id' => $user_team_details->team_id ?? '',
            'team_name' => $user_team_details->team[0]->name
        ];
        return response()->json(['data' => $data]);
    }
}
