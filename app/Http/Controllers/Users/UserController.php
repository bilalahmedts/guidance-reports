<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public function index()
    {
        $users = User::sortable()->paginate(10);
        return view('users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        $teams = Team::all();
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
        $teams = Team::all();

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
        $user->update($request->except('role'));
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
