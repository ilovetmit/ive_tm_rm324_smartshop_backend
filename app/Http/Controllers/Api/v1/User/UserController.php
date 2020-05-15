<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserManagement\User;
use App\http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function getAll()
    {
        $model = User::all();
        return UserResource::collection($model);
    }

    public function login(Request $request)
    {
        if (empty($request['email'])) {
            return response(['message' => 'You input wrong email, please try again.']);
        } else if (empty($request['password'])) {
            return response(['message' => 'You input wrong passoword, please try again.']);
        }

        $login = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($login)) {
            return response(['message' => 'invalide login']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response([
            'user' => Auth::user(),
            'access_token' => $accessToken
        ]);
    }
}
