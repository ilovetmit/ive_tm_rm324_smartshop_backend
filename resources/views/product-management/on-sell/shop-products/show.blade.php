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
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <td>
                            {{ $shopProduct->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.product_id') }}
                        </th>
                        <td>
                            {{ $shopProduct->product_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.qrcode') }}
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
<!-- hasManyTable -->
<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#shopProducts_products" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.sub_title_1.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#shopProducts_shopProductInventories" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.sub_title_3.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#shopProducts_LEDs" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.sub_title_4.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="shopProducts_products">
            @includeIf('product-management.on-sell.shop-products.relationships.shop-products-products', ['products' => $shopProduct->hasProduct])
        </div>
        <div class="tab-pane" role="tabpanel" id="shopProducts_shopProductInventories">
            @includeIf('product-management.on-sell.shop-products.relationships.shop-products-shop-product-inverntories', ['shopProductInventories' => $shopProduct->hasShopProductInventory])
        </div>
        <div class="tab-pane" role="tabpanel" id="shopProducts_LEDs">
            @includeIf('product-management.on-sell.shop-products.relationships.shop-products-leds', ['LEDs' => $shopProduct->hasLED])
        </div>
    </div>
</div>
@endsection