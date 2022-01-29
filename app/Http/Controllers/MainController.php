<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\isNull;

class MainController extends Controller
{
    public function __construct()
    {
    }
    public function loginUser(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $result = DB::table('user')
            ->where('username', '=', $username)
            ->where('password', '=', $password)
            ->get();

        if (count($result) > 0) {
            $token = Str::random(32);
            DB::table('token')->insert([
                'type' => '1',
                'userid' => $result[0]->userid,
                'token' => $token,
                'expired' => Carbon::now()->addDay(7)->timestamp
            ]);
            return response()->json(['result' => true, 'id' => $result[0]->userid, 'token' => $token], 200);
        } else {
            return response()->json(['result' => false, 'id' => '', 'token' => ''], 401);
        }

        //return response()->json(['result' => true,'id' => 64, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
    }
    public function loginDevice(Request $request)
    {
        $utoken = $request->token;
        $result = DB::table('token')
            ->where('token', '=', $utoken)
            ->get();
        if (count($result) > 0) {
            $token = Str::random(32);
            DB::table('token')->insert([
                'type' => '2',
                'userid' => $result[0]->userid,
                'token' => $token,
                'expired' => Carbon::now()->addDay(7)->timestamp
            ]);
            return response()->json(['result' => true, 'token' => $token], 200);
        } else {
            return response()->json(['result' => false, 'token' => ''], 400);
        }

        //return response() -> json(['result' => true, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
    }
    public function logoutUser(Request $request)
    {
        $userid = $request->id;
        $token = $request->token;
        DB::table('token')
            ->where('userid', '=', $userid)
            ->where('token', '=', $token)
            ->delete();
        return response()->json(['code' => true, 'type' => "result", 'message' => "Success"], 200);
    }
    public function createUser(Request $request)
    {
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $name = $request->name;
        $tel = $request->tel;

        $id = DB::table('user')->insertGetId([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'name' => $name,
            'tel' => $tel
        ]);
        if ($id>0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"],200);
        } else {
            return response()->json(['code' => 400, 'type' => "", 'message' => ""],400);
        }
    }
    public function updateUser(Request $request)
    {
        $userid = $request->userid;
        $email = $request->email;
        $password = $request->password;
        $name = $request->name;
        $tel = $request->tel;
        $affected = DB::table('user')
            ->where('userid', '=', $userid)
            ->update([
                'email' => $email,
                'password' => $password,
                'name' => $name,
                'tel' => $tel
            ]);
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"],200);
        } else {
            return response()->json(['code' => 400, 'type' => "", 'message' => ""],400);
        }
    }
    public function removeUser(Request $request){
        $userid = $request->userid;
        $affected = DB::table('user')
            ->where('userid','=',$userid)
            ->delete();
            if ($affected > 0) {
                return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"],200);
            } else {
                return response()->json(['code' => 400, 'type' => "", 'message' => ""],400);
            }
    }
    public function getBuylists(Request $request,$userid){
        $result = DB::table('buylist')->where('userid','=',$userid)->get();
        return response()->json(['result' => $result]);
    }
    public function getBuylist(Request $request, $userid,$buylistId){
        $result = DB::table('buylistdetails')->where('buyid','=',$buylistId)->get();
        $items = [];
        foreach($result as $row){
            $items.array_push([$result->productid,$result->qty]);
        }
        return response()->json(['id' => $buylistId, 'item' => $items],200);
    }
    public function addBuylist(Request $request, $userid){


    }
    public function updateBuylist(Request $request,$userid,$buyid){

    }
    public function removeBuylist(Request $request, $userid, $buyid){
        $affected_item = DB::table('buylistdetails')->where('buyid','=',$buyid)->delete();
        $affected = DB::table('buylist')->where('buyid','=',$buyid);
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"]);
        } else {
            return response()->json(['code' => 400, 'type' => "", 'message' => ""]);
        }
    }
    public function getProduct(Request $request){
        $productid = $request->productid;
        $result = DB::table('product')->where('productid','=',$productid)->first();
        if ($result){
            return response()->json(["id" => $result->productid, "name" => $result->name, "description"=>$result->description, "price"=>$result->price, "Location"=>$result->Location],200);
        }else{
            return response()->json(["id" => "", "name" => "", "description"=>"", "price"=>"", "Location"=>""],400);
        }
    }
    public function addProduct(Request $request){
        $result = DB::table('product')->insertGetId([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'Location'=>$request->Location
        ]);
        if($result){
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"]);
        }

    }
    public function updateProduct(Request $request){
        $productid = $request->productid;
        $affected = DB::table('product')
            ->where('productid','=',$productid)
            ->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'Location'=>$request->Location
        ]);
        if ($affected){
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"],200);
        }else{
            return response()->json(['code' => 400, 'type' => "result", 'message' => ""],400);
        }
    }
    public function removeProduct(Request $request){
        $productid = $request->productid;
        $affected = DB::table('product')->where('productid','=',$productid)->delete();
        if ($affected){
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"],200);
        }else{
            return response()->json(['code' => 400, 'type' => "result", 'message' => ""],400);
        }
    }

    public function testdb(Request $request)
    {
        $result = DB::select("SELECT * FROM user;");
        return response($result, 200);
    }
}
