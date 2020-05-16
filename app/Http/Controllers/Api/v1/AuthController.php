<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedDate = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $validatedDate['password'] = bcrypt($request->password);

        $user = User::create($validatedDate);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'message' => 'Successfully created user!',
            'access_token' => $accessToken
        ]);
    }

    public function login(Request $request)
    {
        if (empty($request['email'])) {
            return response(['message' => 'You input wrong email, please try again.']);
        } else if (empty($request['password'])) {
            return response(['message' => 'You input wrong passoword, please try again.']);
        }

        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            // 'remember_me' => 'boolean'
        ]);

        if (!Auth::attempt($loginData)) {
            return response(['message' => 'invalide login']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        // if ($request->remember_me)
        //     $token->expires_at = Carbon::now()->addWeeks(1);

        return response([
            'access_token' => 'Bearer ' . $accessToken,
            // 'expires_at' => Carbon::parse(
            //     $tokenResult->token->expires_at
            // )->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response([
            'message' => 'Successfully logged out'
        ]);
    }
  
    // public function user(Request $request)
    // {
    //     return response([
    //         $request->user()
    //     ]);
    // }
}
