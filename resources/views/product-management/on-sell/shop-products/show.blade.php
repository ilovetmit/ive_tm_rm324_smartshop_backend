@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productManagement.sub_title_4.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('ProductManagement.ShopProducts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_4.fields.id') }}
                        </th>
                        <td>
                            {{ $shopProduct->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_4.fields.product_id') }}
                        </th>
                        <td>
                            {{ $shopProduct->product_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_4.fields.qrcode') }}
                        </th>
                        <td>
                            {{ $shopProduct->qrcode }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('ProductManagement.ShopProducts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection