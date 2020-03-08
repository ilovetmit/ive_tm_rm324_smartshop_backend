<?php

namespace App\Http\Requests;

use App\Models\ProductManagement\VendingMachine\VendingProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVendingProductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('vending_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:vending_products,id',
        ];
    }
}
