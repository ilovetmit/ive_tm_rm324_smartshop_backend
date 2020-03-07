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
                            {{ trans('cruds.productManagement.sub_title_6.fields.shop_product_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_6.fields.rfid_code') }}
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
                            {{ $shopProductInventory->shop_product_id ?? '' }}
                        </td>
                        <td>
                            {{ $shopProductInventory->rfid_code ?? '' }}
                        </td>
                        <td>
                            {{ $shopProductInventory->is_sold ?? '' }}
                        </td>
                        <td>
                            @can('shop_product_inventory_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('ProductManagement.ShopProductInventories.show', $shopProductInventory->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('shop_product_inventory_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('ProductManagement.ShopProductInventories.edit', $shopProductInventory->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('shop_product_inventory_delete')
                            <form action="{{ route('ProductManagement.ShopProductInventories.destroy', $shopProductInventory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
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
    'permission_massDestory'    => 'shop_product_inventory_delete',
    'route'                     => route('ProductManagement.ShopProductInventories.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-ShopProductInventory'
])
@endsection