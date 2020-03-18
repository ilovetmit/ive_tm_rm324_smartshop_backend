@extends('layouts.admin')
@section('content')
@can('product_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("ProductManagement.Products.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.productManagement.product.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productManagement.product.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Product">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.tag') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.category') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr data-entry-id="{{ $product->id }}">
                        <td>

                        </td>
                        <!-- ----------------id---------------- -->
                        <td>
                            {{ $product->id ?? '' }}
                        </td>
                        <!-- ----------------name---------------- -->
                        <td>
                            {{ $product->name ?? '' }}
                        </td>
                        <!-- ----------------quantity & status---------------- -->
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => $product->status == 1 ? config('constant.product_status')['tag_type_1'] : config('constant.product_status')['tag_type_2'],
                            'element' => $product->quantity,
                            ])
                            @include('module.datatable.badge_tag.tag',[
                            'type' => $product->status == 1 ? config('constant.product_status')['tag_type_1'] : config('constant.product_status')['tag_type_2'],
                            'element' => config('constant.product_status')[$product->status] ?? '',
                            ])
                        </td>
                        <!-- ----------------tag---------------- -->
                        <td>
                            @foreach($product->hasTag as $key => $tag)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $tag->name,
                            ])
                            @endforeach
                        </td>
                        <!-- ----------------category---------------- -->
                        <td>
                            @foreach($product->hasCategory as $key => $category)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $category->name,
                            ])
                            @endforeach
                        </td>
                        <!-- ----------------action---------------- -->
                        <td>
                            @include('module.datatable.action.index',[
                            'permission_subject' => 'product',
                            'route_subject' => 'ProductManagement.Products',
                            'id' => $product->id
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
'permission_massDestory' => 'product_delete',
'route' => route('ProductManagement.Products.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Product'
])
@endsection