<?php

namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use App\Models\UserManagement\User;
// massDestroy
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('UserManagement.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->pluck('name', 'id');
        return view('UserManagement.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('UserManagement.roles.index');
    }

    public function show(Role $role)
    {
        $role->load('permissions', 'rolesUsers');
        return view('UserManagement.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        return view('UserManagement.roles.edit', compact('permissions', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('UserManagement.roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
