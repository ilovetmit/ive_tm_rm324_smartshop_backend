<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Led;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class FaceController extends ApiController
{
    public function face_scan(Request $request){

        // todo face test
        try {
            if (!$request->user_id) {
                return parent::sendError('No face', 215);
            }

            $user_id = $request->user_id;
            if($user = User::find($user_id)){
                $name = $user->first_name.' '.$user->last_name;
                return parent::sendResponse('user', $user->email, 'Face Scan successfully');
            }
            return parent::sendError('Not fount user', 215);

        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }
}
