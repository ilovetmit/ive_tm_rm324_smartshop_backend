<?php


namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use App\Models\UserManagement\User;
// massDestroy
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('UserManagement.Permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('UserManagement.Permissions.create');
    }

    public function store(Request $request)
    {
        $permission = Permission::create($request->all());
        return redirect()->route('UserManagement.Permissions.index');
    }

    public function show(Permission $permission)
    {
        $permission->load('hasRole');  
        return view('UserManagement.Permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        // $permission = '12345678';
        return view('UserManagement.Permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return redirect()->route('UserManagement.Permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back();
    }

    public function massDestroy(MassDestroyPermissionRequest $request)
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
