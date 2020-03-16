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
<!-- hasManyTable -->
<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#shopProductInventories_shopProducts" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.sub_title_1.title') }}
            </a>
        </li>
       
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="shopProductInventories_shopProducts">
            @includeIf('product-management.on-sell.shop-product-inventories.relationships.shop-product-inventories-shop-products', ['shopProducts' => $shopProductInventory->hasShopProduct])
        </div>
    </div>
</div>
@endsection