<?php

namespace App\Http\Controllers;

use App\Http\Requests\CMURequest;
use App\Models\CmuData;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CMUController extends Controller
{
    public function index()
    {
        $cmu = CmuData::sortable()->paginate(10);
        return view('cmu.index', (compact('cmu')));
    }

    public function create()
    {
        $users = User::all();
        return view('cmu.create', compact('users'));
    }
    public function getUserDetail($id)
    {
        $user = User::findOrFail($id);
        $data = [
            'name' => $user->name ?? '',
            'email' => $user->email ?? '',
        ];
        return response()->json(['data' => $data]);
    }
    public function store(CMURequest $request)
    {
        CmuData::create($request->all());
        Session::flash('success', 'CMU Details Added successfully!');
        return redirect()->route('cmu.index');
    }
}
