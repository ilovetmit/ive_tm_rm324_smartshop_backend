<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function __construct()
    {
        
    }
    public function loginUser(){
        return response()->json(['result' => true,'id' => 64, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
    }
    public function loginDevice(){
        return response() -> json(['result' => true, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
    }
    public function logoutUser(){
        return response()->json(['code'=>true,'type'=>"result",'message'=>"Success"]);
    }
    public function testdb(){
        $result = app('db')->select('SELECT * FROM product;');
        return response($result,200);
    }
}