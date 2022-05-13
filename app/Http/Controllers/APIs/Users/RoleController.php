<?php

namespace App\Http\Controllers\APIs\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(5);
        return response()->json(['roles' => $roles], 200);
    }

    public function store(RoleRequest $request)
    {
        Role::create($request->all());
        return response()->json([
            "success" => true,
            "message" => "Role created successfully.",
            ]);
    }
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        Session::flash('success', 'Role updated successfully!');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        Session::flash('success', 'Role deleted successfully!');
        return redirect()->back();
    }
}
