<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Team;
use App\Models\User;
use App\Models\GuidanceReport;
use App\Http\Requests\GuidanceReportRequest;

use Illuminate\Support\Facades\Session;

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
        $categories = Category::all();
        return view('guidance-reports.create', compact('users','categories'));
    }
    public function getUserTeamDetails($id)
    {
        $user_team_details = User::findOrFail($id);
        $data = [
            'team_id' => $user_team_details->team_id ?? '',
            'team_name' => $user_team_details->team->name ?? ''
        ];
        return response()->json(['data' => $data]);
    }
    public function store(Request $request)
    {
        GuidanceReport::create($request->all());
        Session::flash('success', 'Report Generated successfully!');
        return redirect()->route('guidance-reports.index');
    }
}
