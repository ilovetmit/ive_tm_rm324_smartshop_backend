<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request;

class MainController extends Controller
{
    public function __construct()
    {
        
    }
    public function loginUser(Request $request){
        return response()->json(['result' => true,'id' => 64, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
    }
    public function loginDevice(Request $request){
        return response() -> json(['result' => true, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
    }
    public function logoutUser(Request $request){
        return response()->json(['code'=>true,'type'=>"result",'message'=>"Success"]);
    }
    public function testdb(Request $request){
        $result = app('db')->select('SELECT * FROM product;');
        return response($result,200);
    }
}