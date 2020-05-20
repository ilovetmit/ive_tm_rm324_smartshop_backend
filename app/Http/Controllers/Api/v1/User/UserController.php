<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserManagement\User;
use App\http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAll()
    {
        $model = User::all();
        return UserResource::collection($model);
    }

    public function index()
    {
        $user = Auth::guard('api')->user()->id;
        $model = User::all();
        return UserResource::collection($model)->where('id', $user);

        // $user['gender'] = config('constant.gender')[$user['gender']];
        // $user['status'] = config('constant.user_status')[$user['status']];
        // return UserResource::collection($user);
    }

    public function create()
    {
        // 'email',
        // 'first_name',
        // 'last_name',
        // 'password',
        // 'vitcoin_address',
        // 'vitcoin_primary_key',
        // 'avatar',
        // 'birthday',
        // 'gender',
        // 'telephone',
        // 'bio',
        // 'status',
    }

    public function update(Request $request)
    {
        // update : telephone and bio
        $user = Auth::guard('api')->user();

        if (!$user) {
            return response(['message' => 'Unexpected error occurs, please contact admin and see what happen.']);
        }

        // depend on design UI : one form or one by one
        // one form
        if ((int) $user->telephone != (int) $request->telephone) {
            $user->telephone = (int) $request->telephone;
        } elseif ($user->bio != $request->bio) {
            $user->bio = $request->bio;
        } else {
            return response(['message' => 'Unexpected error occurs, please contact admin and see what happen.']);
        }

        // one by one
        // if ($request->type == "telephone") {
        //     $user->telephone = $request->telephone;
        // } elseif ($request->type == "bio") {
        //     $user->bio = $request->bio;
        // } else {
        //     return response(['message' => 'Unexpected error occurs, please contact admin and see what happen.']);
        // }

        $user->save();

        return response([
            '$request->type' => $request->type,
            'user' => $user,
            'message' => 'Update Profile Data successfully.',
        ]);
    }

    public function update_avatar(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($request->hasFile('avatar')) {
            $photoTypes = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('avatar')->store('avatar');
                $user->avatar = basename($file);
                $user->save();
                $query = [
                    'id' => $user->user_id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'detail' => $user,
                ];
                return response([
                    'user' => $query,
                    'message' => 'Update successfully.'
                ]);
            } else {
                return response(['message' => 'Cannot Update, please check your information again']);
            }
        } else {
            return response(['message' => 'Cannot Update, please check your information again']);
        }
    }

    public function update_password(Request $request)
    {
        $user = Auth::guard('api')->user();

        if (!$user) {
            return response(['message' => 'Unexpected error occurs, please contact admin and see what happen.']);
        }

        if (!Hash::check($request->password_current, $user->password)) {
            return response(['message' => 'The current password is incorrect. Please check and re-enter.']);
        }

        $user->password = $request->password;
        $user->api_token = str_random(64);
        $user->save();

        return response(['message' => "success"]);
        
        // refresh token fail
        // $client = new Client;
        // $response = $client->post('http://127.0.0.1:8000/oauth/token', [
        //     'form_params' => [
        //         'grant_type' => 'refresh_token',
        //         'refresh_token' => 'the-refresh-token',
        //         'client_id' => 'client-id',
        //         'client_secret' => 'client-secret',
        //         'scope' => '',
        //     ],
        // ]);
        // return json_decode((string) $response->getBody(), true);
    }

    public function destroy($id)
    {
        // can not delete
    }
}
