<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    public function __construct()
    {
        
    }
    public function loginUser(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $result = DB::table('user')
            ->where('email','=',$email)
            ->where('password','=',$password)
            ->get();
        
        if(count($result)>0){
            $token = Str::random(32);
            DB::table('token')->insert([
                'type'=>'1',
                'userid'=>$result[0]->userid,
                'token'=>$token,
                'expired'=>Carbon::now()->addDay(7)->timestamp
            ]);
            return response()->json(['result' => true,'id' => $result[0]->userid, 'token' => $token],200);
        }else{
            return response()->json(['result' => false ,'id' => '', 'token' => ''],401);
        }
        
        //return response()->json(['result' => true,'id' => 64, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
    }
    public function loginDevice(Request $request){
        $utoken = $request->token;
        $result = DB::table('token')
            ->where('token','=',$utoken)
            ->get();
        if(count($result)>0){
            $token = Str::random(32);
            DB::table('token')->insert([
                'type'=>'2',
                'userid'=>$result[0]->userid,
                'token'=>$token,
                'expired'=>Carbon::now()->addDay(7)->timestamp
            ]);
            return response()->json(['result'=>true, 'token'=>$token],200);
        }else{
            return response()->json(['result'=>false, 'token'=>''],400);
        }
        
        //return response() -> json(['result' => true, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
    }
    public function logoutUser(Request $request){
        $userid = $request->id;
        $token = $request->token;
        DB::table('token')
            ->where('userid','=',$userid)
            ->where('token','=',$token)
            ->delete();
        return response()->json(['code'=>true,'type'=>"result",'message'=>"Success"],200);
    }
    public function testdb(Request $request){
        $result = DB::select("SELECT * FROM user;");
        return response($result,200);
    }
}