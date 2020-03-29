@extends('layouts.admin')
@section('content')
@can('vending_product_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("ProductManagement.VendingProducts.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.productManagement.vending_product.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productManagement.vending_product.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-VendingProduct">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.channel') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendingProducts as $key => $vendingProduct)
                    <tr data-entry-id="{{ $vendingProduct->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $vendingProduct->id ?? '' }}
                        </td>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $vendingProduct->hasProduct->id . ". " . $vendingProduct->hasProduct->name ?? '',
                            ])
                        </td>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'dark',
                            'element' => $vendingProduct->channel ?? '',
                            ])
                        </td>
                        <td>
                            @include('module.datatable.action.index',[
                            'permission_subject' => 'vending_product',
                            'route_subject' => 'ProductManagement.VendingProducts',
                            'id' => $vendingProduct->id
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
'permission_massDestory' => 'vending_product_delete',
'route' => route('ProductManagement.VendingProducts.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-VendingProduct'
])
@endsection