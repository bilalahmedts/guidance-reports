<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Team;
use App\Models\User;
use App\Models\GuidanceReport;
use App\Http\Requests\GuidanceReportRequest;
use App\Exports\GuidanceReportExport;

use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class GuidanceReportController extends Controller
{
    public function report(Request $request)
    {
        if ($request->has('start_date')) {
            $query = new GuidanceReport;
            if (!empty($request->start_date) && !empty($request->end_date)) {
                $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date);
                $end_date = Carbon::createFromFormat('d/m/Y', $request->end_date);
                $query = $query->whereDate('created_at', '>=', $start_date->toDateString());
                $query = $query->whereDate('created_at', '<=', $end_date->toDateString());
            } elseif (!empty($request->start_date)) {
                $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date);
                $query = $query->whereDate('created_at', $start_date->toDateString());
            }
            $stats = $query->paginate(10);
        }
        else{
            $stats = array();
        }
        return view('reports.guidance-reports', compact('stats'));
    }

    public function index()
    {   
        $stats = GuidanceReport::paginate(10);
        return view('reports.index', compact('stats'));
    }

    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('reports.create', compact('users','categories'));
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
        $stats = GuidanceReport::where('user_id', $request->user_id)->whereDate('created_at', now())->count();
        if ($stats > 0) {
            Session::flash('warning', 'Record already exists for current date');
            return redirect()->route('reports.index');           
        }
        GuidanceReport::create($request->all());
        Session::flash('success', 'Data Added successfully!');
        return redirect()->route('reports.index');
    }

    public function edit(GuidanceReport $stat)
    {
        $users = User::all();
        $categories = Category::all();
        return view('reports.edit', compact('stat', 'users', 'categories'));
    }

    public function update(GuidanceReportRequest $request, GuidanceReport $stat)
    {
        $stat->update($request->all());
        Session::flash('success', 'Entry updated successfully!');
        return redirect()->route('reports.index');
    }

    public function destroy(GuidanceReport $stat)
    {
        $stat->delete();
        Session::flash('success', 'Entry deleted successfully!');
        return back();
    }

    

}
