<?php

namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use App\Models\UserManagement\User;
// massDestroy
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user-management.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('user-management.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'         => 'unique:users|required|email',
            'password'      => 'required',
            'first_name'    => 'required|String',
            'last_name'     => 'required|String',
            'avatar'        => 'nullable',
            'birthday'      => 'before_or_equal:now|nullable',
            'gender'        => 'required',
            'telephone'     => 'digits:8|nullable',
            'bio'           => 'nullable',
            'status'        => 'required',
            'roles'         => 'required',
        ]);
        $data = $request->all();
        if (isset($request->avatar)) {
            $photoTypes = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('avatar')->store('public/users/avatar');
                $data['avatar'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        } else {
            $data['avatar'] = 'person.png';
        }
        $user = User::create($data);
        $user->hasRole()->sync($request->input('roles', []));
        return redirect()->route('UserManagement.Users.index');
    }

    public function show(User $user)
    {
        $user->load('hasRole', 'hasAddress', 'hasDevice', 'hasInterest', 'hasVitcoin');
        return view('user-management.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        $user->load('hasRole');
        return view('user-management.users.edit', compact('roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email'         => 'required|email|unique:users,email' . ($user->id ? ",$user->id" : ''),
            'password'      => 'sometimes',
            'first_name'    => 'required|String',
            'last_name'     => 'required|String',
            'birthday'      => 'before_or_equal:now|nullable',
            'gender'        => 'required',
            'telephone'     => 'digits:8|nullable',
            'bio'           => 'nullable',
            'status'        => 'required',
            'roles'         => 'required',
        ]);
        $data = $request->all();
        if (isset($request->avatar)) {
            $photoTypes = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('avatar')->store('public/users/avatar');
                $data['avatar'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        } else {
            $data['avatar'] = 'person.png';
        }
        $user->update($data);
        $user->hasRole()->sync($request->input('roles', []));
        return redirect()->route('UserManagement.Users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
