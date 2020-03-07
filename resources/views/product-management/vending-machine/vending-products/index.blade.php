@extends('layouts.admin')
@section('content')
@can('vending_product_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("ProductManagement.VendingProducts.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.productManagement.sub_title_3.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productManagement.sub_title_3.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-VendingProduct">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_3.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_3.fields.product_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_3.fields.channel') }}
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
                            {{ $vendingProduct->product_id ?? '' }}
                        </td>
                        <td>
                            {{ $vendingProduct->channel ?? '' }}
                        </td>
                        <td>
                            @can('vending_product_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('ProductManagement.VendingProducts.show', $vendingProduct->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('vending_product_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('ProductManagement.VendingProducts.edit', $vendingProduct->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('vending_product_delete')
                            <form action="{{ route('ProductManagement.VendingProducts.destroy', $vendingProduct->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    'permission_massDestory'    => 'vending_product_delete',
    'route'                     => route('ProductManagement.VendingProducts.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-VendingProduct'
])
@endsection