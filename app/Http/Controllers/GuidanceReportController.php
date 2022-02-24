<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Team;
use App\Models\User;
use App\Models\GuidanceReport;
use App\Http\Requests\GuidanceReportRequest;
use App\Exports\GuidanceReportExport;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class GuidanceReportController extends Controller
{

    public function index()
    {   
        $stats = GuidanceReport::paginate(10);
        return view('index', compact('stats'));
    }
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('create', compact('users','categories'));
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
    public function store(GuidanceReportRequest $request)
    {
        $stats = GuidanceReport::whereDate('created_at', now())->count();
        if ($stats > 1) {
            Session::flash('warning', 'Record already exists for current date');
            return redirect()->route('index');
        }
        GuidanceReport::create($request->all());
        Session::flash('success', 'Data Added successfully!');
        return redirect()->route('index');
    }
    public function export()
    {
        $stats = GuidanceReport::all();
        return Excel::download(new GuidanceReportExport($stats), 'Guidance-Report.xlsx');
    }
}
