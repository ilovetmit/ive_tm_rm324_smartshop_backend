<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\UserManagement\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('SmartShop')->accessToken;
            return response()->json(['data' => $success], $this->successStatus);
        } else {
            return response()->json(['data' => 'Unauthorised'], 216);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['status'] = 1;

        $user = User::forceCreate($input);

        $success['token'] =  $user->createToken('SmartShop')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['data' => $success], $this->successStatus);
    }


    public function logout()
    {
        Auth::user()->token()->delete();
        return response()->json(['message' => 'logout success'], $this->successStatus);
    }
}
