<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\Checkout;
use App\Events\RFID;
use App\Models\ProductManagement\OnSell\ShopProductInventory;
use App\Models\UserManagement\User;
use App\Models\TransactionManagement\Transaction;
use App\Models\TransactionManagement\ProductTransaction;
use App\Models\ProductManagement\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class ProductCheckoutController extends ApiController
{

    public function checkout(Request $request)
    {
        $token = $request->token;
        if (Cache::tags('checkout')->has($token)) {
            $product = Cache::tags('checkout')->get($token);

            // todo Check money, check stock

            // todo Payment currency and RFID update status

            return parent::sendResponse('data', $product, 'Product list Cache data');
        } else {
            return parent::sendError('Token Expired', 215);
        }
    }

    public function checkout_transaction(Request $request)
    {
        try {
            $user = User::find(Auth::guard('api')->user()->id);
            $bankAccount = $user->hasBankAccount;
            if (!$user) {
                return parent::sendError('You are Hacking.', 216);
            }
            $amount = $request->get('amount');

            $transactions = new Transaction;
            $transactions->header = "S-SHOP@TMIT QR Checkout spending";
            $transactions->user_id = $user->id;
            $transactions->amount = $amount;
            $currency = array_flip(config("constant.transaction_currency"));
            $transactions->currency = $currency[$request->get('payment')];

            if ($request->get('payment') == 'VitCoin') { //todo Vitcoin payment

            } elseif ($request->get('payment') == 'Saving') {
                if ($amount > $bankAccount->saving_account) {
                    return parent::sendError('Your saving account does not have enough money', 233);
                }

                $bankAccount->saving_account = $bankAccount->saving_account - $amount;
                $transactions->balance = $bankAccount->saving_account;
                $bankAccount->save();
                $transactions->save();
            } else {
                return parent::sendError('Non pay type', 216);
            }
            $productList = $request->get('productList');


            foreach ($productList as $product_data) {
                $product_id = $product_data['has_shop_product']['id'];
                $product = Product::find($product_id);
                $rfid_id = $product_data['id'];

                $rfid = ShopProductInventory::find($rfid_id);
                $rfid->is_sold = 2;
                $rfid->save();

                $productTransaction = new ProductTransaction;
                $productTransaction->transaction_id = $transactions->id;
                $productTransaction->product_id = $product->id;
                $productTransaction->quantity = 1;
                $productTransaction->shop_type = 2;
                $productTransaction->save();

                $product->quantity = $product->quantity  - 1;
                $product->save();
            }


            $data = $transactions->load("hasProduct_transaction", "hasProduct_transaction.hasProduct");
            event(new Checkout("REFRESH"));

            return parent::sendResponse('data', $data, 'Buy Order Success');
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }
}
