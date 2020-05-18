@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productManagement.shop_product_inventory.title') }}
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
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $shopProductInventory->hasShopProduct->hasProduct->id . ". " .
                            $shopProductInventory->hasShopProduct->hasProduct->name ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.rfid_code') }}
                        </th>
                        <td>
                            {{-- todo what is this image?--}}
                            <!-- <img src="{{ asset('storage/shop_product_inventory/rfid_code/'.$shopProductInventory->rfid_code) }}" width="150px"> -->
                            {{$shopProductInventory->rfid_code}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.is_sold') }}
                        </th>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => $shopProductInventory->is_sold == 1 ?
                            config('constant.device_isActive')['tag_type_1'] :
                            config('constant.device_isActive')['tag_type_2'],
                            'element' =>
                            config('constant.shopProductInventories_isSold')[$shopProductInventory->is_sold] ?? '',
                            ])
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
