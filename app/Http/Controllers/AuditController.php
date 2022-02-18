<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Audit;
use App\Http\Requests\AuditRequest;
use App\Models\Datapoint;
use App\Models\EvaluationResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuditController extends Controller
{
    public function index(Request $request)
    {
        $query = new Audit;
        if ($request->has('user_id')) {
            if (!empty($request->user_id)) {
                $query = $query->where('user_id', 'LIKE', "%{$request->user_id}%");
            }
        }
        if ($request->has('outcome')) {
            if (!empty($request->outcome)) {
                $query = $query->where('outcome', 'LIKE', "%{$request->outcome}%");
            }
        }
        if ($request->has('percentage')) {
            if (!empty($request->percentage)) {
                $query = $query->where('percentage', 'LIKE', "%{$request->percentage}%");
            }
        }
        $users = User::all();
        $audits = $query->sortable()->paginate(10);
        return view('audit.index', compact('audits', 'users'));
    }

    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('audit.create', compact('users', 'categories'));
    }

    public function getUserDetail($id)
    {
        $user = User::findOrFail($id);
        $data = [
            'campaign_id' => $user->campaign_id ?? '',
            'campaign_name' => $user->campaign->name ?? '',
            'reporting_to' => $user->getSupervisor->name ?? ''
        ];
        return response()->json(['data' => $data]);
    }

    public function store(AuditRequest $request, Audit $audit)
    {
        $audit = $audit->create($request->all());
        $this->addDatapoint($request, $audit);
        Session::flash('success', 'Audit Added successfully!');
        return redirect()->route('audit.index');
    }
    public function addDatapoint($request, $audit)
    {
        foreach ($request->all() as $key => $value) {
            $key_arr = explode('-', $key);
            if ($key_arr[0] == 'answer') {
                $evaluation_response = new EvaluationResponse;
                $evaluation_response->answer = $value;
                $evaluation_response->datapoint_id = $key_arr[1];
                $evaluation_response->evaluation_id = $audit->id;
                $evaluation_response->save();
            }
        }
    }
    public function edit(Audit $audit)
    {
        $users = User::all();
        $categories = Category::all();
        $datapoints = Datapoint::all();
        $query = new EvaluationResponse;
        $responses = $query->where('evaluation_id', $audit->id)->get();
        return view('audit.edit', compact('audit', 'users', 'categories', 'responses', 'datapoints'));
    }

    public function update(AuditRequest $request, Audit $audit)
    {
        $audit->update($request->all());
        $this->updateDatapoint($request, $audit);
        Session::flash('success', 'Audit Updated successfully!');
        return redirect()->route('audit.index');
    }

    public function updateDatapoint($request, $audit)
    {
        foreach ($request->all() as $key => $value) {
            $key_arr = explode('-', $key);
            if ($key_arr[0] == 'answer') {
                $evaluation_response = EvaluationResponse::findOrFail($key_arr[1]);
                $evaluation_response->answer = $value;
                $evaluation_response->datapoint_id = $key_arr[1];
                $evaluation_response->evaluation_id = $audit->id;
                $evaluation_response->save();
            }
        }
    }

    public function destroy(Audit $audit)
    {
        $audit->delete();
        Session::flash('success', 'Audit deleted successfully!');
        return back();
    }
}
