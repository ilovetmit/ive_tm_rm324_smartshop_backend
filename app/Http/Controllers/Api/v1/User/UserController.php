<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Api\v1\ApiController;
use Illuminate\Http\Request;
use App\Models\UserManagement\User;
use App\http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    public function get_profile()
    {
        try {
            $user = User::find(Auth::guard('api')->user()->id);
            return parent::sendResponse('data', $user, 'Profile Data');
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }

    public function user_list()
    {
        try {
            $users = User::select('id', 'email')->orderBy('email')->get();
            return parent::sendResponse('data', $users, 'User Data');
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
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

    public function update_profile(Request $request)
    {
        try {

            $user = User::find(Auth::guard('api')->user()->id);
            if (!$user) {
                return parent::sendError('User Not Found', 216);
            }
            if ($request->type == "name") {
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
            } elseif ($request->type == "telephone") {
                $user->telephone = $request->telephone;
            } elseif ($request->type == "birthday") {
                $user->birthday = $request->birthday;
            } elseif ($request->type == "bio") {
                $user->bio = $request->bio;
            } elseif ($request->type == "gender") {
                $user->gender = $request->gender;
            } else {
                return parent::sendError('Non type.', 216);
            }
            $user->save();
            $query = [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'detail' => $user,
            ];
            return parent::sendResponse('data', $query, 'Update Profile Data successfully.');
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }

    public function update_avatar(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);

        if ($request->hasFile('avatar')) {
            $photoTypes = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('avatar')->store('public/users/avatar');
                $user->avatar = basename($file);
                $user->save();
                $query = [
                    'id' => $user->user_id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'detail' => $user,
                ];
                return parent::sendResponse('data', $query, 'Update successfully.');
            } else {
                return parent::sendError('Cannot Update, please check your information again', 215);
            }
        } else {
            return parent::sendError('Cannot Update, please check your information again', 215);
        }
    }

    public function update_password(Request $request)
    {
        try {
            $user = User::find(Auth::guard('api')->user()->id);

            if (!$user) {
                return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
            }

            if (!Hash::check($request->password_current, $user->password)) {
                return parent::sendError('The current password is incorrect. Please check and re-enter.', 217);
            }

            $user->password = $request->password;
            $user->api_token = Str::random(64);
            $user->save();

            return parent::sendResponse('status', "success", 'OK');
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }

    public function destroy($id)
    {
        // can not delete
    }

    public function check_password(Request $request)
    {
        try {
            $user = User::find(Auth::guard('api')->user()->id);
            if (empty($user)) {
                // user not found
                return parent::sendError('You input wrong email, please try again.', 215);
            } else if (!\Hash::check($request->password, $user->password)) {
                // password error
                return parent::sendError('You input wrong passoword, please try again.', 215);
            } else {
                return parent::sendResponse('State', 'Purchase Success', 'Purchase Success');
            }
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }
}
