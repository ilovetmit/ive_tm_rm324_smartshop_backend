@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productManagement.shop_product.title') }}
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
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $shopProduct->hasProduct->id . ". " . $shopProduct->hasProduct->name ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.qrcode') }}
                        </th>
                        <td>
                            <img src="{{ asset('storage/shop_product/qrcode/'.$shopProduct->qrcode) }}" width="150px">
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
                {{ trans('cruds.productManagement.product.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#shopProducts_shopProductInventories" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.shop_product_inventory.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#shopProducts_LEDs" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.led.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="shopProducts_products">
            @includeIf('product-management.on-sell.shop-products.relationships.shop-products-products', ['product' => $shopProduct->hasProduct])
        </div>
        <div class="tab-pane" role="tabpanel" id="shopProducts_shopProductInventories">
            @includeIf('product-management.on-sell.shop-products.relationships.shop-products-shop-product-inventories', ['shopProductInventories' => $shopProduct->hasShopProductInventory])
        </div>
        <div class="tab-pane" role="tabpanel" id="shopProducts_LEDs">
            @includeIf('product-management.on-sell.shop-products.relationships.shop-products-leds', ['leds' => $shopProduct->hasLED])
        </div>
    </div>
</div>
@endsection