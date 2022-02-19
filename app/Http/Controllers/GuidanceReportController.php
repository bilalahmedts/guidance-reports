<?php

namespace App\Http\Controllers;
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

}
