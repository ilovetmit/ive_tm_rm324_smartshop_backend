<?php

namespace App\Http\Controllers\Face;

use App\Models\FaceData;
use App\Models\ProductManagement\Category;
use App\Models\TransactionManagement\ProductTransaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class FaceController extends Controller {
    public function index() {
        $result = $this->get_data();
        return view('user-panel.face-recognition.index',compact('result'));
    }

    public function post_data(Request $request) {

        $face = new FaceData();
        $face->people = $request->people;
        $face->gender = $request->gender;
        $face->age = serialize($request->age);
        $face->expression = serialize($request->expression);
        $face->save();

        $result = $this->get_data();

        return response()->json($result);
    }

    private function get_data() {
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
