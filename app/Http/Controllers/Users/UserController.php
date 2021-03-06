<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = new User;
        if ($request->has('name')) {
            if (!empty($request->name)) {
                $query = $query->where('name', 'LIKE', "%{$request->name}%");
            }
        }
        if ($request->has('email')) {
            if (!empty($request->email)) {
                $query = $query->where('email', 'LIKE', "%{$request->email}%");
            }
        }
        if ($request->has('team_id')) {
            if (!empty($request->team_id)) {
                $query = $query->where('team_id', 'LIKE', "%{$request->team_id}%");
            }
        }
        $teams = Team::where('id', '!=', 8)->get();
        $users = $query->sortable()->paginate(10);
        return view('users.index', compact('users','teams'));
    }
    public function create()
    {
        $roles = Role::all();
        $teams = Team::where('id', '!=', 8)->get();
        return view('users.create', compact('roles', 'teams'));
    }
    public function store(UserRequest $request)
    {
        $roles = explode(',', $request->role);
        $user = User::create($request->except('role'));
        $user->syncRoles($roles);
        Session::flash('success', 'User added successfully!');
        return redirect()->route('users.index');
    }
    public function edit(User $user)
    {
        $roles = Role::all();
        $teams = Team::where('id', '!=', 8)->get();
        return view('users.edit', compact('user','roles','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $roles = explode(',', $request->role);
        if (empty($request->password)) {    
        $user->update($request->except('role','password'));
        } else {
        $user->update($request->except('role'));
        }
        $user->syncRoles($roles);    
        Session::flash('success', 'User updated successfully!');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('success', 'User updated successfully!');
        return redirect()->route('users.index');
    }
}
