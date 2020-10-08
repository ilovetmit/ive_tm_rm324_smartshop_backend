<?php

namespace App\Http\Controllers;


use App\Models\LockerManagement\Locker;
use App\Models\ProductManagement\OnSell\LED;
use App\Models\ProductManagement\Product;
use App\Models\ProductManagement\VendingMachine\VendingProduct;
use App\Models\TransactionManagement\LockerTransaction;
use App\Models\TransactionManagement\ProductTransaction;
use App\Models\UserManagement\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

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

    public function index()
    {
        $lockers = Locker::where('is_active', 1)->get();
        $lockerTransactions = LockerTransaction::whereDate('created_at', Carbon::today())->orderBy('created_at','desc')->get();
        $lockersRecords = array();
        $lockerStatusCount = Locker::where('status',1)->count();
        foreach ($lockers as $locker) {
            $lockerOrder = 0;
            if($locker->status == 1){
                foreach ($lockerTransactions as $lockerTransaction) {
                    $lockerOrder++;
                    if ($locker->id == $lockerTransaction->locker_id) {
                        break;
                    }
                }
            }

            $data = [
                "locker" => $locker,
                "status" => LockerTransaction::where('locker_id', $locker->id)->orderBy('created_at')->first(),
                "order" => $lockerOrder,
            ];
            array_push($lockersRecords, $data);
        }

        $vending_queue = Cache::get('vending_queue');

        $ledSensor = null;


        return view('user-panel.s-shop-monitor.index', compact('lockersRecords','lockerStatusCount', 'vending_queue'));
    }
}
