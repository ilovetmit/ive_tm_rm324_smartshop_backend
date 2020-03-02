<?php

namespace App\Http\Requests;

use App\Models\UserManagement\Permission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAdvertisementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('advertisement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'header' => [
                'required',
            ],
            'image' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'status' => [
                'required',
                'integer',
            ],
        ];
    }
}
