<?php

namespace App\Http\Controllers;


use App\Models\FaceData;
use App\Models\LockerManagement\Locker;
use App\Models\ProductManagement\OnSell\LED;
use App\Models\ProductManagement\Product;
use App\Models\ProductManagement\VendingMachine\VendingProduct;
use App\Models\TransactionManagement\LockerTransaction;
use App\Models\TransactionManagement\ProductTransaction;
use App\Models\TransactionManagement\RemittanceTransaction;
use App\Models\TransactionManagement\Transaction;
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
        $result = $this->get_monitor_data();
        return view('user-panel.s-shop-monitor.index', compact('result'));
    }

    public function get_monitor_json(){
        $data = $this->get_monitor_data();
        $response = [
            'data' => $data,
            'message' => 'monitor_data',
        ];
        return response()->json($response, 200);
    }

    private function get_monitor_data(){
        /**
         * Locker Information
         */
        $lockers = Locker::where('is_active', 1)->get();
        $lockersRecords = array();
        $lockerStatusCount = Locker::where('status', 1)->count();
        foreach ($lockers as $locker) {
            $data = [
                "locker" => $locker,
                "status" => LockerTransaction::where('locker_id', $locker->id)->orderBy('created_at')->first(),
            ];
            array_push($lockersRecords, $data);
        }
        if (Cache::has('locker_queue')) {
            $lockerQueue = Cache::get('locker_queue');
        } else {
            $lockerQueue = [];
        }

        /**
         * Vending Information
         */
        if (Cache::has('vending_queue')) {
            $vendingQueue = Cache::get('vending_queue');
        } else {
            $vendingQueue = [];
        }

        /**
         * LED Data
         */
        $ledSensor = null;

        /**
         * Face Data
         */
        $faceResult = $this->get_face_data();

        /**
         * Product Order Data
         */
        $totalOrderCount = ProductTransaction::all()->count();
        $todayOrderCount = ProductTransaction::whereDate('created_at', Carbon::today())->count();
        $newProduct = ProductTransaction::orderBy("created_at", "desc")->take(1)->get();
        $newProduct->load('hasProduct');

        /**
         * Transaction analysis
         */
        $transactionsSpendingCount = ProductTransaction::where("shop_type", '2')->count();
        $transactionsInsuranceCount = Transaction::where("header", 'like', 'Insurance - %')->count();
        $transactionsVendingSpendingCount = ProductTransaction::where("shop_type", '1')->count();
        $transactionsTransferCount = RemittanceTransaction::count();
        $transactionsLockerCount = LockerTransaction::count();
        $transactionTypeCount = [
            $transactionsSpendingCount,
            $transactionsInsuranceCount,
            $transactionsVendingSpendingCount,
            $transactionsTransferCount,
            $transactionsLockerCount
        ];

        return $result = [
            'faceResult' => $faceResult,
            'lockersRecords' => $lockersRecords,
            'lockerStatusCount' => $lockerStatusCount,
            'lockerQueue' => $lockerQueue,
            'vendingQueue' => $vendingQueue,
            'totalOrderCount' => $totalOrderCount,
            'todayOrderCount' => $todayOrderCount,
            'newProduct' => $newProduct,
            'transactionTypeCount' => $transactionTypeCount
        ];
    }

    private function get_face_data()
    {
        $datas = FaceData::whereDate('created_at', Carbon::today())->get();

        $gender = 0;
        $age_male = array_fill(0, 10, 0);
        $age_female = array_fill(0, 10, 0);

        foreach ($datas as $data) {
            // ['0-9', '10-19', '20-29', '30-39', '40-49', '50-59', '60-69', '70-79', '80-89', '>=90']
            for ($i = 0; $i <= 9; $i++) {
                foreach ($data->age[$i] as $age) {
                    if ($age == 1) {
                        $age_male[$i]++;
                    } else {
                        $age_female[$i]++;
                    }
                }
            }
            for ($i = 0; $i <= 9; $i++) {
                if ($age_male[$i] != 0) {
                    $age_male[$i] += $data->people / $age_male[$i];
                }
                if ($age_female[$i] != 0) {
                    $age_female[$i] += $data->people / $age_female[$i];
                }
            }
            $gender += $data->gender;
        }

        $temp_male = 0;
        $temp_female = 0;
        foreach ($age_male as $male) {
            $temp_male += $male;
        }
        foreach ($age_female as $female) {
            $temp_female += $female;
        }
        for ($i = 0; $i <= 9; $i++) {
            if ($age_male[$i] != 0) {
                $age_male[$i] /= $temp_male;
                $age_male[$i] *= 100;
            }
            if ($age_female[$i] != 0) {
                $age_female[$i] /= $temp_female;
                $age_female[$i] *= 100;
            }
        }
        if (count($datas) > 0) {
            $gender /= count($datas);
        }

        return $result = [
            'gender' => $gender,
            'age_male' => $age_male,
            'age_female' => $age_female,
        ];
    }
}
