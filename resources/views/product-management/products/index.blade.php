@extends('layouts.admin')
@section('content')
@can('product_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("ProductManagement.Products.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.productManagement.sub_title_1.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productManagement.sub_title_1.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Product">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.tag') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.status') }}
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
                        <td>
                            {{ $product->id ?? '' }}
                        </td>
                        <td>
                            {{ $product->name ?? '' }}
                        </td>
                        <td>
                            @foreach($product->hasTag as $key => $tag)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $tag->name,
                            ])
                            @endforeach
                        </td>
                        <td>
                            @foreach($product->hasCategory as $key => $category)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $category->name,
                            ])
                            @endforeach
                        </td>
                        <td>
                            @if($product->status == 1)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'danger',
                            'element' => config('constant.product_status')[$product->status] ?? '',
                            ])
                            @else
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'success',
                            'element' => config('constant.product_status')[$product->status] ?? '',
                            ])
                            @endif
                        </td>
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