<?php

namespace App\Http\Controllers;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

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
            return response()->json(['result' => true, 'id' => $result[0]->userid, 'username' => $result[0]->username, 'name' => $result[0]->name, 'tel' => $result[0]->tel, 'email' => $result[0]->email, 'token' => $token], 200);
        } else {
            return response()->json(['result' => false, 'id' => '', 'username' => '', 'name' => '', 'tel' => '', 'email' => '', 'token' => ''], 401);
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
        if ($id > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }
    public function updateUser(Request $request)
    {
        $userid = $request->userid;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $name = $request->name;
        $tel = $request->tel;
        $updatePassword = $request->input('updatePassword');
        if ($updatePassword) {
            $affected = DB::table('user')
                ->where('userid', '=', $userid)
                ->update([
                    'email' => $email,
                    'password' => $password,
                    'name' => $name,
                    'tel' => $tel
                ]);
        } else {
            $affected = DB::table('user')
                ->where('userid', '=', $userid)
                ->update([
                    'email' => $email,
                    'name' => $name,
                    'tel' => $tel
                ]);
        }

        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }
    public function removeUser(Request $request)
    {
        $userid = $request->userid;
        $affected = DB::table('user')
            ->where('userid', '=', $userid)
            ->delete();
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }
    public function getBuylists(Request $request, $userid)
    {
        $result = DB::table('buylist')->where('userid', '=', $userid)->get();
        if ($result->count()) {
            return response()->json(['result' => $result]);
        } else {
        }
    }
    public function getBuylist(Request $request, $userid)
    {
        $buylistId = $request->input('buylistId');
        $items = DB::table('buylistdetails')->join('product', 'buylistdetails.productid', '=', 'product.productid')->where('buyid', '=', $buylistId)->get();
        $buylist = DB::table('buylist')->where('buyid', '=', $buylistId)->first();
        return response()->json(['id' => $buylistId, 'name' => $buylist->name, 'createdate' => $buylist->createdate, 'items' => $items], 200);
    }
    public function addBuylist(Request $request, $userid)
    {
        $name = $request->name;
        //return print_r($request->items);
        $items = $request->items;
        //return count($items);
        if (count($items) > 0) {
            $buylistId = DB::table('buylist')->insertGetId([
                'name' => $name,
                'userid' => $userid
            ]);
            if ($buylistId > 0) {
                foreach ($items as $item) {
                    //$product = DB::table('product')->where('name','=', $name)->get();
                    $result = DB::table('buylistdetails')->insert([
                        'buyid' => $buylistId,
                        'productid' => $item['productid'],
                        'qty' => $item['quantity']
                    ]);
                    if ($result) {
                        continue;
                    } else {
                        return response()->json(['code' => 400, 'type' => "error", 'message' => "Product Lookup Error"], 400);
                        break;
                    }
                }
            } else {
                return response()->json(['code' => 400, 'type' => "error", 'message' => "Insert buylist error"], 400);
            }
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        }
    }
    public function updateBuylist(Request $request, $userid)
    {
        $buylistId = $request->id;
        $name = $request->name;
        $items = $request->items;
        $updateBuyList  = $request->input('updateBuyList');
        $updateBuyItems = $request->input('updateBuyItems');
        $resultbl = false;
        $resultbi = false;
        if ($updateBuyList) {
            $results = DB::table('buylist')->where('buyid', '=', $buylistId)->update([
                'name' => $name
            ]);
            if ($results) {
                $resultbl = true;
            }
        } else {
            $resultbl = true;
        }
        if ($updateBuyItems) {
            $affected_item = DB::table('buylistdetails')->where('buyid', '=', $buylistId)->delete();
            if ($affected_item > 0) {
                foreach ($items as $item) {
                    //$product = DB::table('product')->where('name', '=', $request->name)->first();
                    $result = DB::table('buylistdetails')->insert([
                        'buyid' => $buylistId,
                        'productid' => $item['productid'],
                        'qty' => $item['qty']
                    ]);
                    if ($result) {
                        continue;
                    } else {
                        return response()->json(['code' => 400, 'type' => "error", 'message' => "Product insert Error"], 400);
                        break;
                    }
                }
                $resultbi = true;
            } else {
                return response()->json(['code' => 400, 'type' => "error", 'message' => "Delete old buylist items error"], 400);
            }
        } else {
            $resultbi = true;
        }
        if ($resultbl && $resultbi) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        }
    }
    public function removeBuylist(Request $request, $userid)
    {
        $buyid = $request->input('buylistId');
        $affected_item = DB::table('buylistdetails')->where('buyid', '=', $buyid)->delete();
        $affected = DB::table('buylist')->where('buyid', '=', $buyid)->delete();
        if ($affected > 0 && $affected_item > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }
    public function getProduct(Request $request)
    {
        $method = intval($request->input('method'));
        if (!$method) {
            $method = 1;
        }
        switch ($method) {
            case (1): //GetProductByid
                $productid = $request->input('productid');
                $result = DB::table('product')->where('productid', '=', $productid)->first();
                if ($result) {
                    return response()->json(["productid" => $result->productid, "name" => $result->name, "description" => $result->description, "price" => $result->price, "Location" => $result->Location], 200);
                } else {
                    return response()->json(["productid" => "", "name" => "", "description" => "", "price" => "", "Location" => ""], 400);
                }
                break;
            case (2): //GetProductByName
                $name = $request->input('name');
                $result = DB::table('product')->where('name', '=', $name)->first();
                if ($result) {
                    return response()->json(["productid" => $result->productid, "name" => $result->name, "description" => $result->description, "price" => $result->price, "Location" => $result->Location], 200);
                } else {
                    return response()->json(["productid" => "", "name" => "", "description" => "", "price" => "", "Location" => ""], 400);
                }
                break;
            case (3): //GetProductByKeywords
                $name = $request->input('name');
                $result = DB::table('product')->where('name', 'LIKE', '%' . $name . '%')->get();
                if ($result->count() > 0) {
                    return response()->json(["result" => $result], 200);
                } else {
                    return response()->json(["productid" => "", "name" => "", "description" => "", "price" => "", "Location" => ""], 400);
                }
                break;
        }
    }
    public function addProduct(Request $request)
    {
        $result = DB::table('product')->insertGetId([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'Location' => $request->Location
        ]);
        if ($result) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }
    public function updateProduct(Request $request)
    {
        $productid = $request->productid;
        $affected = DB::table('product')
            ->where('productid', '=', $productid)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'Location' => $request->Location
            ]);
        if ($affected) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }
    public function removeProduct(Request $request)
    {
        $productid = $request->productid;
        $affected = DB::table('product')->where('productid', '=', $productid)->delete();
        if ($affected) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }

    public function getProductDiscount(Request $request, $productid)
    {
        $discountid = $request->discountid;
        if (!$discountid > 0) {
            $result = DB::table('productdiscount')->where('productid', '=', $productid)->get();
            return response()->json(["result" => $result], 200);
        } else {
            $result = DB::table('productdiscount')->where('productid', '=', $productid)->where('discountid', '=', $discountid)->first();
            return response()->json(["result" => $result], 200);
        }
    }
    public function addProductDiscount(Request $request, $productid)
    {
        $name = $request->name;
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $rate = $request->rate;

        $result = DB::table('productdiscount')->insertGetId([
            'productid' => $productid,
            'name' => $name,
            'starttime' => $starttime,
            'endtime' => $endtime,
            'rate' => $rate
        ]);

        if ($result > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }
    public function updateProductDiscount(Request $request, $productid)
    {
        $discountid = $request->discountid;
        $name = $request->name;
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $rate = $request->rate;

        $affected = DB::table('productdiscount')->where('discountid', '=', $discountid)->update([
            'productid' => $productid,
            'name' => $name,
            'starttime' => $starttime,
            'endtime' => $endtime,
            'rate' => $rate
        ]);
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }
    public function removeProductDiscount(Request $request, $productid)
    {
        $discountid = $request->discountid;
        $affected = DB::table('productdiscount')->where('discountid', '=', $discountid)->delete();
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }
    public function getProductQRCode(Request $request)
    {
        
        $productid = $request->input('productid');
        $result = DB::table('product')->where('productid', '=', $productid)->first();
        if ($result) {
            $data = [
                "id"=>$result->productid,
                "name"=>"Apple"
            ];
            ob_start();
            $options = new QROptions([
                'version'    => 5,
                'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                'eccLevel'   => QRCode::ECC_H,
                'scale'      => 20
            ]);
            $qrcode = new QRCode($options);
            return view('view','<img src="'.$qrcode->render(json_encode($data)).'" alt="QR Code" />');
        } else {
            return response()->json(["id" => "", "name" => "", "description" => "", "price" => "", "Location" => ""], 400);
        }
    }

    public function GenerateQRCode($data)
    {
        $options = new QROptions([
            'version'    => 5,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'   => QRCode::ECC_H,
        ]);
        $qrcode = new QRCode();
        return $qrcode->render($data);
    }
    public function testdb(Request $request)
    {
        $result = DB::select("SELECT * FROM user;");
        return response($result, 200);
    }
}
