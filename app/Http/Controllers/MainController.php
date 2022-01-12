<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function __construct()
    {
        
    }

    public function login(){

        return '1234';
    }
    public function loginUser(){

        return '{
            "result": true,
            "id": 64,
            "token": "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"
          }';
    }
    public function loginDevice(){

        return '{
            "result": true,
            "token": "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"
          }';
    }
    public function logoutUser(){

        return '{
            "code": 200,
            "type": "result",
            "message": "Success"
          }';
    }
}