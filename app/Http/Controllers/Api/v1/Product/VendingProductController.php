<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\VendingProductResource;
use App\Models\ProductManagement\VendingMachine\VendingProduct;
use App\Models\ProductManagement\Product;
use App\Models\UserManagement\User;
use App\Models\TransactionManagement\Transaction;
use App\Models\TransactionManagement\ProductTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendingProductController extends ApiController
{
    public function vending_list()
    {
        try {
            $vending = VendingProduct::with('hasProduct')->with('hasProduct.hasCategory')->paginate(10);
            return parent::sendResponse('data', $vending, 'All Vending Product Data');
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }

    public function vending_detail($id)
    {
        try {
            $product = Product::where('id', $id)->with('hasCategory')->get();
            if ($product) {
                return parent::sendResponse('data', $product, 'Vending Product Data');
            } else {
                return parent::sendError('Product information expired', 216);
            }
        } catch (\Exception $e) {
            return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
        }
    }

    public function vending_buy(Request $request)
    {
        try {
            $user = User::find(Auth::guard('api')->user()->id);
            $bankAccount = $user->hasBankAccount;
            $vendingProduct = Product::where('id', $request->get('product_id'))->first();
            if ($vendingProduct->quantity >= 1) {

                $transactions = new Transaction;
                $transactions->header = "S-SHOP@TMIT S-Vending spending ($vendingProduct->name)";
                $transactions->user_id = Auth::guard('api')->user()->id;
                $transactions->amount = $vendingProduct->price;
                $currency = array_flip(config("constant.transaction_currency"));
                $transactions->currency = $currency[$request->get('payment')];

                if ($request->get('payment') == 'VitCoin') {  //todo VitCoin Vending

                } elseif ($request->get('payment') == 'Saving') {
                    if ($vendingProduct->price > $bankAccount->saving_account) {
                        return parent::sendError('You do not have enough coin (Saving A/C)', 233);
                    }

                    $bankAccount->saving_account = $bankAccount->saving_account - $vendingProduct->price;
                    $transactions->balance = $bankAccount->saving_account;
                    $transactions->save();
                    $bankAccount->save();
                } else {
                    return parent::sendError('Unexpected error occurs, please contact admin and see what happen. Payment Error', 216);
                }

                $productTransaction = new ProductTransaction;
                $productTransaction->transaction_id = $transactions->id;
                $productTransaction->product_id = $request->get('product_id');
                $productTransaction->quantity = 1;
                $productTransaction->shop_type = 1;
                $productTransaction->save();

                $vendingProduct->quantity = $vendingProduct->quantity - 1;
                $vendingProduct->status = 1;
                $vendingProduct->save();
            } else {
                return parent::sendError('No quantity left', 216);
            }

            return parent::sendResponse('status', true, 'Vending Buying');
        } catch (\Exception $e) {
            //      return parent::sendError('Unexpected error occurs, please contact admin and see what happen.', 216);
            return parent::sendError($e->getMessage(), 216);
        }
    }
}
