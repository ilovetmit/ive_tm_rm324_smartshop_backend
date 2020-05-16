<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Insurance;
use App\Models\Led;
use App\Models\Locker;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Transactions;
use App\Models\Vending;
use Carbon\Carbon;
use Eskie\Multichain\Facades\MultiChain;
use Illuminate\Http\Request;
use App\Events\QRCodeLogin;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\MoneyTransaction;
use App\Models\LockerTransaction;
use App\Models\ProductTransaction;

class SShopMonitorController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  public function index(){
      // todo redo
      // todo use event
//    $lockers = Locker::where('available', true)->get();
//    $lockerTransactions = LockerTransaction::where('status', "1")->orderBy('created_at')->get();
//    $lockersRecords = array();
//    foreach ($lockers as $locker){
//      $lockerOrder = 0;
//      foreach ($lockerTransactions as $lockerTransaction){
//        $lockerOrder++;
//        if($locker->locker_id==$lockerTransaction->locker_id){
//          break;
//        }
//      }
//
//      $data = [
//        "locker" => $locker,
//        "status" => LockerTransaction::where('status', "1")->where('locker_id',$locker->locker_id)->orderBy('created_at')->first(),
//        "order" => $lockerOrder,
//      ];
//      array_push($lockersRecords,$data);
//    }
//
//    $vendings = array();
//    for($i = 1;$i<=9;$i++){
//      $vendingProduct = Product::where('is_vending',1)->where('vending_channel',$i)->first();
//      $vendingTransactions = Vending::where('status', "1")->orderBy('created_at')->get();
//      $vendingOrder = 0;
//      foreach ($vendingTransactions as $vendingTransaction){
//        $vendingOrder++;
//        if($i==$vendingTransaction->vending_channel){
//          break;
//        }
//      }
//      $vendingTransaction = Vending::where('status', "1")->where('vending_channel',$i)->orderBy('created_at')->first();
//      $data = [
//        'product' => $vendingProduct,
//        'status' => $vendingTransaction,
//        'order' => $vendingOrder
//      ];
//      array_push($vendings,$data);
//    }
//
//    $ledPrice = unserialize(Led::where('type', 1)->first()->data);
//    $ledSensor = unserialize(Led::where('type', 2)->first()->data);
//    $ledString = unserialize(Led::where('type', 3)->first()->data);
//
//    $blockchains = MultiChain::liststreamkeyitems("transaction","transaction_record");
//    $blockchainStream = MultiChain::liststreams("transaction")[0];
//
//    $newOrder = ProductTransaction::orderBy("created_at","desc")->take(1)->get();
//    $newOrder->load('product');
//    $orderCount = ProductTransaction::all()->count()+Vending::all()->count();
//
//    $userCount = User::all()->count();
//    $productCount = Product::all()->count();
//
//    $totalOrderCount = ProductTransaction::whereDate('created_at', Carbon::today())->count();
//
//    $advertisements = Advertisement::where('status', config('constants.STATUS.ACTIVE'))->inRandomOrder()->take(2)->get();
//
//    $transactionsSpendingCount = Transactions::where("type",config("constants.TRANSACTIONS_TYPE.SPENDING"))->count();
//    $transactionsInsuranceCount = Transactions::where("type",config("constants.TRANSACTIONS_TYPE.INSURANCE"))->count();
//    $transactionsVendingSpendingCount = Transactions::where("type",config("constants.TRANSACTIONS_TYPE.VENDING_SPENDING"))->count();
//    $transactionsTransferCount = Transactions::where("type",config("constants.TRANSACTIONS_TYPE.TRANSFER"))->count();
//    $transactionsLockerCount = Transactions::where("type",config("constants.TRANSACTIONS_TYPE.LOCKER"))->count();
//
//    $transactionTypeCount=[
//      $transactionsSpendingCount,
//      $transactionsInsuranceCount,
//      $transactionsVendingSpendingCount,
//      $transactionsTransferCount,
//      $transactionsLockerCount
//    ];

    return view( 's_shop_monitor.index', compact('blockchains','lockersRecords','vendings','ledPrice','ledSensor','ledString','blockchainStream','newOrder','orderCount','totalOrderCount','userCount','productCount','transactionTypeCount','advertisements'));
  }
}
