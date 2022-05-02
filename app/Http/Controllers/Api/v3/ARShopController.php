<?php

namespace App\Http\Controllers\Api\v3;

use App\Events\Checkout;
use App\Http\Controllers\Controller;
use App\Models\ProductManagement\OnSell\ShopProductInventory;
use App\Models\ProductManagement\Product;
use App\Models\TransactionManagement\ProductTransaction;
use App\Models\TransactionManagement\Transaction;
use App\Models\UserManagement\User;
use http\Env\Response;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ARShopController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Get the bearer token from the request headers.
     *
     * @return string|null
     */
    public function bearerToken()
    {
        $header = $this->header('Authorization', '');
        if (Str::startsWith($header, 'Bearer ')) {
            return Str::substr($header, 7);
        }
    }
    /**
     * public function loginUser(Request $request)
     * {
     * $username = $request->input('username');
     * $password = $request->input('password');
     * $result = DB::table('user')
     * ->where('username', '=', $username)
     * ->where('password', '=', $password)
     * ->get();
     *
     * if (count($result) > 0) {
     * $token = Str::random(32);
     * DB::table('token')->insert([
     * 'type' => '1',
     * 'userid' => $result[0]->userid,
     * 'token' => $token,
     * 'expired' => Carbon::now()->addDay(7)->timestamp
     * ]);
     * return response()->json(['result' => true, 'id' => $result[0]->userid, 'username' => $result[0]->username, 'name' => $result[0]->name, 'tel' => $result[0]->tel, 'email' => $result[0]->email, 'token' => $token], 200);
     * } else {
     * return response()->json(['result' => false, 'id' => '', 'username' => '', 'name' => '', 'tel' => '', 'email' => '', 'token' => ''], 401);
     * }
     *
     * //return response()->json(['result' => true,'id' => 64, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
     * }
     **/
    /**
     * public function loginDevice(Request $request)
     * {
     * $utoken = $request->token;
     * $result = DB::table('token')
     * ->where('token', '=', $utoken)
     * ->first();
     * if ($result) {
     * $token = Str::random(32);
     * $outputqr = $request->input('outputqr');
     * if ($request->input('ecc') == "") {
     * $ecc = "L";
     * } else {
     * $ecc = $request->input('ecc');
     * }
     * DB::table('token')->insert([
     * 'type' => '2',
     * 'userid' => $result->userid,
     * 'token' => $token,
     * 'expired' => Carbon::now()->addDay(7)->timestamp
     * ]);
     * $data = ['result' => true, 'userid' => $result->userid, 'token' => $token];
     * if ($outputqr) {
     * $qrcode = QRCode::format('png')
     * ->size(300)
     * ->margin(5)
     * ->encoding('UTF-8')
     * ->errorCorrection($ecc)
     * ->generate(json_encode($data));
     * return response($qrcode)->header('Content-Type', 'image/png');
     * } else {
     * return response()->json($data, 200);
     * }
     * } else {
     * return response()->json(['result' => false, 'userid' => 0, 'token' => ''], 400);
     * }
     *
     * //return response() -> json(['result' => true, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
     * }
     * */
    public function loginDevice(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        //$oatoken = $request->bearerToken();
        $oatoken = $user->createToken('Device')->accessToken;
        $token = bin2hex(random_bytes(20));
        $outputqr = $request->input('outputqr');
        if ($request->input('ecc') == "") {
            $ecc = "L";
        } else {
            $ecc = $request->input('ecc');
        }
        $result = DB::table('device_login')->insertGetId([
            'userid' => $user->id,
            'login_token' => $token,
            'bearer_token' => $oatoken
        ]);
        if ($result > 0) {
            $data = ['result' => true, 'userid' => $user->id, 'token' => $token];
            if ($outputqr) {
                $qrcode = QRCode::format('png')
                    ->size(600)
                    ->margin(5)
                    ->encoding('UTF-8')
                    ->errorCorrection($ecc)
                    ->generate(json_encode($data));
                return response($qrcode)->header('Content-Type', 'image/png');
            } else {
                return response()->json($data, 200);
            }
        } else {
            return response()->json(['data'], 400);
        }
        //return response() -> json(['result' => true, 'token' => "Tzq88tcwx5QWkKnjnLHks2C6evPL2wwLPbkHYrMDbDuNngJhkpaWEHCS4CcsqCsp"],200);
    }

    public function loginDeviceSuccess(Request $request)
    {
        $token = $request->token;
        $userid = $request->userid;

        $result = DB::table('device_login')->where('userid', '=', $userid)->where('login_token', '=', $token)->first();
        //$affected = DB::table('device_login')->where('userid','=',$userid)->where('login_token','=',$token)->delete();
        if ($result != null) {
            $data = ['data' => $result->bearer_token];
            $affected = DB::table('device_login')->where('id', '=', $result->id)->delete();
            return response()->json(['data' => $data], 200);
        }
    }

    /**
     * public function logoutUser(Request $request)
     * {
     * $userid = $request->id;
     * $token = $request->token;
     * DB::table('token')
     * ->where('userid', '=', $userid)
     * ->where('token', '=', $token)
     * ->delete();
     * return response()->json(['code' => true, 'type' => "result", 'message' => "Success"], 200);
     * }
     **/
    public function getUser(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $userid = $user->id;
        return response()->json($user);
    }

    /**
     * public function getUser(Request $request)
     * {
     * $userid = $request->input('userId');
     * $result = DB::table('user')->where('userid', '=', $userid)->first();
     * $data = [
     * "userid" => $result->userid,
     * 'username' => $result->username,
     * 'email' => $result->email,
     * 'password' => $result->password,
     * 'name' => $result->name,
     * 'tel' => $result->tel
     * ];
     * return response()->json($data);
     * }
     *
     * public function createUser(Request $request)
     * {
     * $username = $request->username;
     * $email = $request->email;
     * $password = $request->password;
     * $name = $request->name;
     * $tel = $request->tel;
     *
     * $id = DB::table('user')->insertGetId([
     * 'username' => $username,
     * 'email' => $email,
     * 'password' => $password,
     * 'name' => $name,
     * 'tel' => $tel
     * ]);
     * if ($id > 0) {
     * return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
     * } else {
     * return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
     * }
     * }
     *
     * public function updateUser(Request $request)
     * {
     * $userid = $request->userid;
     * $username = $request->username;
     * $email = $request->email;
     * $password = $request->password;
     * $name = $request->name;
     * $tel = $request->tel;
     * $updatePassword = $request->input('updatePassword');
     * if ($updatePassword) {
     * $affected = DB::table('user')
     * ->where('userid', '=', $userid)
     * ->update([
     * 'email' => $email,
     * 'password' => $password,
     * 'name' => $name,
     * 'tel' => $tel
     * ]);
     * } else {
     * $affected = DB::table('user')
     * ->where('userid', '=', $userid)
     * ->update([
     * 'email' => $email,
     * 'name' => $name,
     * 'tel' => $tel
     * ]);
     * }
     *
     * if ($affected > 0) {
     * return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
     * } else {
     * return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
     * }
     * }
     *
     * public function removeUser(Request $request)
     * {
     * $userid = $request->userid;
     * $affected = DB::table('user')
     * ->where('userid', '=', $userid)
     * ->delete();
     * if ($affected > 0) {
     * return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
     * } else {
     * return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
     * }
     * }
     **/
    public function getBuylists(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $userid = $user->id;
        $result = DB::table('buylist')->where('userid', '=', $userid)->get();
        if ($result->count()) {
            return response()->json(['result' => $result]);
        } else {
            return response()->json(['result' => []]);
        }
    }

    public function getBuylist(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $userid = $user->id;
        $buylistId = $request->input('buylistId');
        $items = DB::table('buylistdetails')->join('products', 'buylistdetails.productid', '=', 'products.id')->where('buyid', '=', $buylistId)->get();
        $buylist = DB::table('buylist')->where('buyid', '=', $buylistId)->first();
        return response()->json(['id' => $buylistId, 'name' => $buylist->name, 'createdate' => $buylist->createdate, 'items' => $items], 200);
    }

    public function addBuylist(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $userid = $user->id;
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
                    //$product = DB::table('products')->where('name','=', $name)->get();
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

    public function updateBuylist(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $userid = $user->id;
        $buylistId = $request->id;
        $name = $request->name;
        $items = $request->items;
        $updateBuyList = $request->input('updateBuyList');
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
                    //$product = DB::table('products')->where('name', '=', $request->name)->first();
                    $result = DB::table('buylistdetails')->insert([
                        'buyid' => $buylistId,
                        'productid' => $item['productid'],
                        'qty' => $item['quantity']
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

    public function removeBuylist(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $userid = $user->id;
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
                //$result = DB::table('products')->where('id', '=', $productid)->first();
                $result = Product::where('id', '=', $productid)->firstOr(function () {
                    return response()->json(["data" => "[]"], 200);
                });
                //return response()->json(["productid" => $result->id, "name" => $result->name, "description" => $result->description, "price" => $result->price, "Location" => $result->Location], 200);
                return response()->json(["data" => $result], 200);
                break;
            case (2): //GetProductByName
                $name = $request->input('name');
                //$result = DB::table('products')->where('name', '=', $name)->first();
                $result = Product::where('name', '=', $name)->firstOr(function () {
                    return response()->json(["data" => "[]"], 200);
                });
                return response()->json(["data" => $result], 200);
                break;
            case (3): //GetProductByKeywords
                $name = $request->input('name');
                //$result = DB::table('products')->where('name', 'LIKE', '%' . $name . '%')->get();
                $result = Product::where('name', 'LIKE', '%' . $name . '%')->firstOr(function () {
                    return response()->json(["data" => "[]"], 200);
                });
                $result = Product::where('name', 'LIKE', '%' . $name . '%')->get();
                return response()->json(["data" => $result], 200);
                break;
        }
        return response()->json(["data" => "[]"], 400);
    }

    /**
     * public function addProduct(Request $request)
     * {
     * $result = DB::table('product')->insertGetId([
     * 'name' => $request->name,
     * 'description' => $request->description,
     * 'price' => $request->price,
     * 'Location' => $request->Location
     * ]);
     * if ($result) {
     * return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
     * } else {
     * return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
     * }
     * }
     *
     * public function updateProduct(Request $request)
     * {
     * $productid = $request->productid;
     * $affected = DB::table('product')
     * ->where('productid', '=', $productid)
     * ->update([
     * 'name' => $request->name,
     * 'description' => $request->description,
     * 'price' => $request->price,
     * 'Location' => $request->Location
     * ]);
     * if ($affected) {
     * return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
     * } else {
     * return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
     * }
     * }
     *
     * public function removeProduct(Request $request)
     * {
     * $productid = $request->productid;
     * $affected = DB::table('product')->where('productid', '=', $productid)->delete();
     * if ($affected) {
     * return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
     * } else {
     * return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
     * }
     * }
     **/
    public function getProductDiscount(Request $request)
    {
        $productid = $request->productid;
        $currenttime = Carbon::now()->timestamp;

        if (!$productid > 0) {
            $result = DB::table('productdiscount')->where('starttime', '<', $currenttime)->where('endtime', '>', $currenttime)->get();
            return response()->json(["result" => $result], 200);
        } else {
            $result = DB::table('productdiscount')->where('productid', '=', $productid)->where('starttime', '<', $currenttime)->where('endtime', '>', $currenttime)->first();
            return response()->json(["result" => $result], 200);
        }
    }

    public function addProductDiscount(Request $request)
    {
        $productid = $request->productid;
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

    public function updateProductDiscount(Request $request)
    {
        $productid = $request->productid;
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

    public function removeProductDiscount(Request $request)
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
        $result = DB::table('products')->where('id', '=', $productid)->first();
        $outputqr = $request->input('outputqr');
        if ($request->input('ecc') == "") {
            $ecc = "L";
        } else {
            $ecc = $request->input('ecc');
        }

        if ($result) {
            $data = [
                "productid" => $result->id,
                "name" => $result->name,
                "description" => $result->description,
                "price" => $result->price

            ];
            if ($outputqr) {
                $qrcode = QRCode::format('png')
                    ->size(1000)
                    ->margin(5)
                    ->encoding('UTF-8')
                    ->errorCorrection($ecc)
                    ->generate(json_encode($data));
                return response($qrcode)->header('Content-Type', 'image/png');
            } else {
                return response($data);
            }

        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }

    public function getCoupon(Request $request)
    {

        if ($request->input('id') > 0) {
            $id = $request->input('id');
            $result = DB::table('coupon')->where('id', '=', $id)->get();
        } else {
            $result = DB::table('coupon')->get();
        }
        if ($result->count() > 0) {
            return response()->json(["result" => $result], 200);
            /**
             * if ($result->count() > 1) {
             * return response()->json(["result" => $result], 200);
             * } else {
             * return response()->json(["id" => $result[0]->id, "title" => $result[0]->title, "description" => $result[0]->description, "rate" => $result[0]->rate], 200);
             * }
             **/
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }

    }

    public function addCoupon(Request $request)
    {
        $title = $request->title;
        $rate = $request->rate;
        $description = $request->description;

        $affected = DB::table('coupon')->insert([
            'rate' => $rate,
            'title' => $title,
            'description' => $description
        ]);
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }

    public function updateCoupon(Request $request)
    {
        $id = $request->id;
        $title = $request->title;
        $rate = $request->rate;
        $description = $request->description;

        $affected = DB::table('coupon')->where('id', '=', $id)->update([
            'rate' => $rate,
            'title' => $title,
            'description' => $description
        ]);
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }

    public function removeCoupon(Request $request)
    {
        $id = $request->input('id');
        $affected = DB::table('coupon')->where('id', '=', $id)->delete();
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }

    public function getUserCoupon(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $userid = $user->id;
        $result = DB::table('usercoupon')->where('userid', '=', $userid)->where('used', '=', 0)->get();
        if ($result->count() > 0) {
            return response()->json(["result" => $result], 200);
        } else {
            //return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
            return response()->json(["result" => []], 200);
        }

    }

    public function addUserCoupon(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $userid = $user->id;
        $couponid = $request->couponid;
        $used = $request->used;
        $expiredate = $request->expiredate;
        $affected = DB::table('usercoupon')->insert([
            'userid' => $userid,
            'couponid' => $couponid,
            'used' => $used,
            'expiredate' => $expiredate
        ]);
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }

    public function updateUserCoupon(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $userid = $user->id;
        $couponid = $request->couponid;
        $used = $request->used;
        $expiredate = $request->expiredate;
        $affected = DB::table('usercoupon')->where('userid', '=', $userid)->where('couponid', '=', $couponid)->update([
            'couponid' => $couponid,
            'used' => $used,
            'expiredate' => $expiredate
        ]);
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }

    public function removeUserCoupon(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        $userid = $user->id;
        $couponid = $request->couponid;
        $affected = DB::table('usercoupon')->where('userid', '=', $userid)->where('couponid', '=', $couponid)->delete();
        if ($affected > 0) {
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
        } else {
            return response()->json(['code' => 400, 'type' => "error", 'message' => "General Error"], 400);
        }
    }

    public function checkout_transaction(Request $request)
    {
        try {
            $user = User::find(Auth::guard('api')->user()->id);
            $bankAccount = $user->hasBankAccount;
            if (!$user) {
                //return parent::sendError('You are Hacking.', 216);
                return response()->json(['code' => 216, 'type' => "error", 'message' => "You are Hacking"], 400);
            }
            $amount = $request->get('amount');

            $transactions = new Transaction;
            $transactions->header = "S-SHOP@TMIT ARShop Checkout spending";
            $transactions->user_id = $user->id;
            $transactions->amount = $amount;
            $currency = array_flip(config("constant.transaction_currency"));
            $transactions->currency = $currency[$request->get('payment')];

            if ($request->get('payment') == 'VitCoin') { //todo Vitcoin payment

            } elseif ($request->get('payment') == 'Saving') {
                if ($amount > $bankAccount->saving_account) {
                    //return parent::sendError('Your saving account does not have enough money', 233);
                    return response()->json(['code' => 233, 'type' => "error", 'message' => "Your saving account does not have enough money"], 400);
                }

                $bankAccount->saving_account = $bankAccount->saving_account - $amount;
                $transactions->balance = $bankAccount->saving_account;
                $bankAccount->save();
                $transactions->save();
            } else {
                //return parent::sendError('Non pay type', 216);
                return response()->json(['code' => 216, 'type' => "error", 'message' => "Non pay type"], 400);
            }
            $productList = $request->get('productList');


            foreach ($productList as $product_data) {
                $product_id = $product_data['has_shop_product']['id'];
                $product = Product::find($product_id);
                //$rfid_id = $product_data['id'];

                //$rfid = ShopProductInventory::find($rfid_id);
                //$rfid->is_sold = 2;
                //$rfid->save();

                $productTransaction = new ProductTransaction;
                $productTransaction->transaction_id = $transactions->id;
                $productTransaction->product_id = $product->id;
                //$productTransaction->quantity = 1;
                $productTransaction->quantity = $product_data['has_shop_product']['quantity'];
                $productTransaction->shop_type = 3;
                $productTransaction->save();

                $product->quantity = $product->quantity - $product_data['has_shop_product']['quantity'];
                $product->save();
            }


            //$data = $transactions->load("hasProduct_transaction", "hasProduct_transaction.hasProduct");
            event(new Checkout("REFRESH"));
            return response()->json(['code' => 200, 'type' => "result", 'message' => "Success"], 200);
            //return parent::sendResponse('data', $data, 'Buy Order Success');
        } catch (\Exception $e) {
            return response()->json(['code' => 216, 'type' => "error", 'message' => $e->getMessage()], 400);
            //return parent::sendError($e->getMessage(), 216);
        }
    }

    public function getOrderHistory(Request $request)
    {

        try {
            if ($request->input('transactionId') > 0) {
                $transactions = Transaction::where('user_id', Auth::guard('api')->user()->id)->where('id', '=', $request->input('transactionId'))->with('hasProduct_transaction')->with('hasProduct_transaction.hasProduct')->orderBy('created_at', 'desc')->get();
            } else {
                $transactions = Transaction::where('user_id', Auth::guard('api')->user()->id)->with('hasProduct_transaction')->with('hasProduct_transaction.hasProduct')->orderBy('created_at', 'desc')->get();
            }
            // $orders = ProductTransaction::rightJoin('products', 'product_transactions.product_id', 'products.id')->rightJoin('transactions', 'product_transactions.transaction_id', 'transactions.id')->where('transactions.user_id', Auth::guard('api')->user()->id)->where('product_transactions.product_id', '<>', null)->orderBy('product_transactions.created_at', 'desc')->get();
            //$transactions = Transaction::where('user_id', Auth::guard('api')->user()->id)->with('hasProduct_transaction')->with('hasProduct_transaction.hasProduct')->orderBy('created_at', 'desc')->get();
            $array = [];
            foreach ($transactions as $key => $transaction) {
                if (count($transaction->hasProduct_transaction) > 0) {
                    $array[] = $transaction;
                }
            }
            // $orders->load('hasProduct')->load('hasProduct.hasCategory');
            // $remark = unserialize($orders->remark); todo Remark for delivery address
            // $orders->load($remarks);
            return response()->json(['data' => $array, 'Order Data'], 200);
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 216);
        }
    }
}
