@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productManagement.sub_title_6.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('ProductManagement.ShopProductInventories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <td>
                            {{ $shopProductInventory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.shop_product_id') }}
                        </th>
                        <td>
                            {{ $shopProductInventory->shop_product_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.rfid_code') }}
                        </th>
                        <td>
                            {{ $shopProductInventory->rfid_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.is_sold') }}
                        </th>
                        <td>
                            {{ $shopProductInventory->is_sold }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('ProductManagement.ShopProductInventories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection