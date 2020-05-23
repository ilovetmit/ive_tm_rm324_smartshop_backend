<?php

namespace App\Http\Controllers\Api\v1\Transaction;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\ProductTransactionResource;
use App\Models\TransactionManagement\ProductTransaction;
use App\Models\ProductManagement\Product;
use App\Models\TransactionManagement\Transaction;
use App\Models\ProductManagement\Category;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductTransactionController extends ApiController
{
    public function getOrderHistory()
    {

        try {
            // $orders = ProductTransaction::rightJoin('products', 'product_transactions.product_id', 'products.id')->rightJoin('transactions', 'product_transactions.transaction_id', 'transactions.id')->where('transactions.user_id', Auth::guard('api')->user()->id)->where('product_transactions.product_id', '<>', null)->orderBy('product_transactions.created_at', 'desc')->get();
            $transactions = Transaction::where('user_id', Auth::guard('api')->user()->id)->with('hasProduct_transaction')->with('hasProduct_transaction.hasProduct')->get();
            $array = [];
            foreach ($transactions as $key => $transaction) {
                if (count($transaction->hasProduct_transaction) > 0) {
                    $array[] = $transaction;
                }
            }
            // $orders->load('hasProduct')->load('hasProduct.hasCategory');
            // $remark = unserialize($orders->remark); todo Remark for delivery address
            // $orders->load($remarks);
            return parent::sendResponse('data', $array, 'Order Data');
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }


    public function order_create(Request $request)
    {
        try {
            $user = User::find(Auth::guard('api')->user()->id);
            $bankAccount = $user->hasBankAccount;
            if (!$user) {
                return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
            }
            $product = Product::where('id', $request->get('product_id'))->first();
            //check quantity left
            if ($product->quantity >= $request->get('quantity')) {
                //cal price
                $price = $product->price * $request->get('quantity');
                // check balance
                $transactions = new Transaction;
                $transactions->header = "S-SHOP@TMIT S-Shop spending ($product->name)";
                $transactions->user_id = Auth::guard('api')->user()->user_id;
                $transactions->amount = $price;
                $currency = array_flip(config("constant.transaction_currency"));
                $transactions->currency = $currency[$request->get('payment')];

                $remark = [
                    "deliveryAddress" => $request->get('deliveryAddress'),
                    "deliveryDateTime" => $request->get('deliveryDateTime'),
                    "phoneNumber" => $request->get('phoneNumber')
                ];






                if ($request->get('payment') == 'VitCoin') { //todo Vitcoin payment
                    // if ($request->get('price') > $bankAccount->ive_coin) {
                    //     return parent::sendError('You do not have enough VitCoin', 233);
                    // }

                    // $productTransaction->save();
                    // $productTransaction->with('hasProduct');

                    // $user->ive_coin = $user->ive_coin - $request->get('price');
                    // $transactions->balance = $user->ive_coin;
                    // $user->save();
                    // $transactions->save();
                } elseif ($request->get('payment') == 'Saving') {
                    if ($price > $bankAccount->saving_account) {
                        return parent::sendError('Your saving account does not have enough money', 233);
                    }

                    $bankAccount->saving_account = $bankAccount->saving_account - $price;
                    $transactions->balance = $bankAccount->saving_account;
                    $bankAccount->save();
                    $transactions->save();
                } else {
                    return parent::sendError('Unexpected error occurs, please contact admin and see what happen. Error Code: 00122', 216);
                }

                $productTransaction = new ProductTransaction;
                $productTransaction->transaction_id = $transactions->id;
                $productTransaction->product_id = $request->get('product_id');
                $productTransaction->quantity = $request->get('quantity');
                $productTransaction->shop_type = 2;
                $productTransaction->remark = serialize($remark);
                $productTransaction->save();

                $product->quantity = $product->quantity  - $request->get('quantity');
                $product->save();

                $data = $transactions->load("hasProduct_transaction", "hasProduct_transaction.hasProduct");
            } else {
                return parent::sendError('No quantity left', 216);
            }

            return parent::sendResponse('data', $data, 'Buy Order Success');
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }
}
