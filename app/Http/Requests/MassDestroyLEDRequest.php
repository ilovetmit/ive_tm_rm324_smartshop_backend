<?php

namespace App\Http\Requests;

use App\Models\ProductManagement\OnSell\LED;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLEDRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('led_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:leds,id',
        ];
    }
}
