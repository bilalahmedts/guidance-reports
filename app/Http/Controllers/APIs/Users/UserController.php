<?php

namespace App\Http\Controllers\APIs\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::when($request, function ($query, $request) {
            $query->search($request);
        })->sortable()->orderBy('id', 'asc')->paginate(10); 
        return response()->json(['users' => $users], 200);
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

     public function show(User $user)
     {
        $userDetail = [
            'name' => $user->name,
            'email' => $user->email,
            'team' => $user->team->name,
        ];
        return response()->json([
            "data" => $userDetail
            ]);
     }

    public function store(UserRequest $request)
    {
        $roles = explode(',', $request->role);
        $user = User::create($request->except('role'));
        $user->syncRoles($roles);
        return response()->json([
            "success" => true,
            "message" => "User created successfully.",
            "data" => $user
            ]);
    }
    public function update(Request $request, User $user)
    {   
        $roles = explode(',', $request->role);
        if (empty($request->password)) {    
        $user->update($request->except('role','password'));
        } else {
        $user->update($request->except('role'));
        }
        $user->syncRoles($roles);    
        return response()->json([
            "success" => true,
            "message" => "User updated successfully.",
            "data" => $user
            ]);
    }

    
}
