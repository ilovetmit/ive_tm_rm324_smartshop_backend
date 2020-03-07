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
        return view('user-management.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->pluck('name', 'id');
        return view('user-management.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->hasPermission()->sync($request->input('hasPermission', []));
        return redirect()->route('UserManagement.Roles.index');
    }

    public function show(Role $role)
    {
        $role->load('hasUser', 'hasPermission');
        return view('user-management.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('hasPermission');
        return view('user-management.roles.edit', compact('permissions', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $role->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('UserManagement.Roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
