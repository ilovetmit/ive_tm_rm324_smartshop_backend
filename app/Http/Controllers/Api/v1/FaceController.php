<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\UserManagement\User;
use Illuminate\Http\Request;



class FaceController extends ApiController
{
    public function face_scan(Request $request)
    {
        // todo face test
        try {
            if (!$request->user_id) {
                return parent::sendError('No face', 215);
            }

            $user_id = $request->user_id;
            if ($user = User::find($user_id)) {
                return parent::sendResponse('user', $user->email, 'Face Scan successfully');
            }
            return parent::sendError('Not fount user', 215);
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }

    public function get_face_list()
    {
        //        todo get user face image folder list
    }
}
