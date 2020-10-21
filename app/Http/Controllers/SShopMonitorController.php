<?php

namespace App\Http\Controllers;


use App\Models\FaceData;
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

        if (Cache::has('vending_queue')) {
            $vending_queue = Cache::get('vending_queue');
        }else{
            $vending_queue = [];
        }

        $ledSensor = null;

        $faceResult = $this->get_face_data();

        return view('user-panel.s-shop-monitor.index', compact('faceResult','lockersRecords','lockerStatusCount', 'vending_queue'));
    }

    private function get_face_data() {
        $datas = FaceData::whereDate('created_at', Carbon::today())->get();

        $gender = 0;
        $age_male = array_fill(0, 10, 0);
        $age_female = array_fill(0, 10, 0);

        foreach ($datas as $data) {
            // ['0-9', '10-19', '20-29', '30-39', '40-49', '50-59', '60-69', '70-79', '80-89', '>=90']
            for ($i = 0; $i <= 9; $i++) {
                foreach ($data->age[$i] as $age) {
                    if($age == 1) {
                        $age_male[$i]++;
                    } else {
                        $age_female[$i]++;
                    }
                }
            }
            for ($i = 0; $i <= 9; $i++) {
                if($age_male[$i] != 0) {
                    $age_male[$i] += $data->people / $age_male[$i];
                }
                if($age_female[$i] != 0) {
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
            if($age_male[$i] != 0) {
                $age_male[$i] /= $temp_male;
                $age_male[$i] *= 100;
            }
            if($age_female[$i] != 0) {
                $age_female[$i] /= $temp_female;
                $age_female[$i] *= 100;
            }
        }
        if(count($datas)>0){
            $gender /= count($datas);
        }

        return $result = [
            'gender' => $gender,
            'age_male' => $age_male,
            'age_female' => $age_female,
        ];
    }
}
