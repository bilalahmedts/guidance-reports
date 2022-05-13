<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\GuidanceReport;
use App\Http\Requests\GuidanceReportRequest;
use App\Exports\GuidanceReportExport;
use App\Imports\GuidanceReportImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GuidanceReportController extends Controller
{
    public function index(Request $request)
    {
        $query = new GuidanceReport;
        if ($request->has('user_id')) {
            if (!empty($request->user_id)) {
                $query = $query->where('user_id', 'LIKE', "%{$request->user_id}%");
            }
        }
        if ($request->has('start_date')) {
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
        if (Auth::user()->roles[0]->name == 'Associate') {
            $query = $query->where('user_id',Auth::user()->id);
        }
        $users = User::where('id', '!=', 1)->get();
        $stats = $query->sortable()->paginate(10);
        return response()->json(['users' => $users, 'stats' => $stats  ], 200);
    }

    public function getUserTeamDetails($id)
    {
        $user_team_details = User::findOrFail($id);
        $data = [
            'user_name' => $user_team_details->name ?? '',
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
        if ((!empty($request->call_per_day[0]) && !empty($request->transfer_per_day[0])) ||
            (!empty($request->call_per_day[1]) && !empty($request->transfer_per_day[1])) || (!empty($request->call_per_day[2])
                && !empty($request->transfer_per_day[2]))
        ) {
            foreach ($request->category as $key => $value) {
                $catgeory_id = $request->category[$key];
                $call_per_day = $request->call_per_day[$key];
                $transfer_per_day = $request->transfer_per_day[$key];
                if (!empty($catgeory_id) && !empty($call_per_day) && !empty($transfer_per_day)) {
                    GuidanceReport::create([
                        "user_id" => $request->user_id,
                        "categories_id" => $catgeory_id,
                        "call_per_day" => $call_per_day,
                        "transfer_per_day" => $transfer_per_day,
                    ]);
                }
            }
        } else {
            GuidanceReport::create($request->except('category', 'call_per_day', 'transfer_per_day'));
        }
        return response()->json(['message' => 'Data Entered Successfully'], 200);
    }

    public function update(GuidanceReportRequest $request, GuidanceReport $stat)
    {
        $stat->update($request->all());
        return response()->json(['message' => 'Data Updated Successfully'], 200);
    }

    public function destroy(GuidanceReport $stat)
    {
        $stat->delete();
        return response()->json(['message' => 'Data Deleted Successfully'], 200);
    }

    public function report(Request $request)
    {
        $query = new GuidanceReport;
        if ($request->has('start_date')) {
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
        } else {
            $stats = array();
        }
        return response()->json(['message' => 'success', 'stats' => $stats  ], 200);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        Excel::import(new GuidanceReportImport,request()->file('file'));  
        return response()->json(['message' => 'Success File Uploaded'], 200);
    }
    
}
