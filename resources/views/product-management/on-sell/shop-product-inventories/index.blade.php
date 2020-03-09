@extends('layouts.admin')
@section('content')
@can('shop_product_inventory_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("ProductManagement.ShopProductInventories.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.productManagement.sub_title_6.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productManagement.sub_title_6.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ShopProductInventory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_6.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_6.fields.shop_product') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_6.fields.is_sold') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shopProductInventories as $key => $shopProductInventory)
                    <tr data-entry-id="{{ $shopProductInventory->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $shopProductInventory->id ?? '' }}
                        </td>
                        <td>
                            @include('module.datatable.badge_tag.tag_suffix',[
                            'type' => 'info',
                            'element' => $shopProductInventory->hasShopProduct->hasProduct->id ?? '',
                            'suffix' => $shopProductInventory->hasShopProduct->hasProduct->name ?? '',
                            ])
                        </td>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => $shopProductInventory->is_sold == 1 ? 'success' : ($shopProductInventory->is_sold == 2 ? 'warning' : 'secondary'),
                            'element' => config('constant.shopProductInventories_isSold')[$shopProductInventory->is_sold] ?? '',
                            ])
                        </td>
                        <td>
                            @include('module.datatable.action.index',[
                            'permission_subject' => 'shop_product_inventory',
                            'route_subject' => 'ProductManagement.ShopProductInventories',
                            'id' => $shopProductInventory->id
                            ])
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent
@include('module.datatable.massdestory',[
'permission_massDestory' => 'shop_product_inventory_delete',
'route' => route('ProductManagement.ShopProductInventories.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-ShopProductInventory'
])
@endsection