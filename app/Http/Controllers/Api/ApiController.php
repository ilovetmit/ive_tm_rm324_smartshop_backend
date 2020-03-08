<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($key, $value, $message){
        $response = [
            $key => $value,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $code = 205){
        $response = [
            'message' => $error,
        ];
        return response()->json($response, $code);
    }

    /**
     * Repond a no content response.
     *
     * @return response
     */
    public function noContent(){
        return response()->json(null, 204);
    }
}
