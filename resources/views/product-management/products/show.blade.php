@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productManagement.sub_title_1.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('ProductManagement.Products.index') }}">
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
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.name') }}
                        </th>
                        <td>
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.price') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => '$ '. $product->price ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.quantity') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => $product->status == 1 ? config('constant.product_status')['tag_type_1'] : config('constant.product_status')['tag_type_2'],
                            'element' => $product->quantity,
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.image') }}
                        </th>
                        <td>
                            <img src="{{ asset('storage/products/image/'.$product->image) }}" width="150px">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.description') }}
                        </th>
                        <td>
                            {{ $product->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.status') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => $product->status == 1 ? config('constant.product_status')['tag_type_1'] : config('constant.product_status')['tag_type_2'],
                            'element' => config('constant.product_status')[$product->status] ?? '',
                            ])
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('ProductManagement.Products.index') }}">
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
            <a class="nav-link" href="#products_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.sub_title_2.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#products_tags" role="tab" data-toggle="tab">
                {{ trans('cruds.tagManagement.sub_title_1.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#products_productWalls" role="tab" data-toggle="tab">
                {{ trans('cruds.tagManagement.sub_title_1.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="products_categories">
            @includeIf('product-management.products.relationships.products-categories', ['categories' => $product->hasCategory])
        </div>
        <div class="tab-pane" role="tabpanel" id="products_tags">
            @includeIf('product-management.products.relationships.products-tags', ['tags' => $product->hasTag])
        </div>
        <div class="tab-pane" role="tabpanel" id="products_productWalls">
            @includeIf('product-management.products.relationships.products-product-walls', ['productWalls' => $product->hasProductWall])
        </div>
    </div>
</div>
@endsection