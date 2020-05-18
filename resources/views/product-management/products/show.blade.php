@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productManagement.product.title') }}
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
                            @include('_module.datatable.badge_tag.tag',[
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
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => $product->status == 1 ? config('constant.product_status')['tag_type_1'] :
                            config('constant.product_status')['tag_type_2'],
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
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => $product->status == 1 ? config('constant.product_status')['tag_type_1'] :
                            config('constant.product_status')['tag_type_2'],
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
        @if(!is_null($product->hasCategory)>0)
        <li class="nav-item">
            <a class="nav-link" href="#categories" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.category.title') }}
            </a>
        </li>
        @endif
        @if(!is_null($product->hasTag)>0)
        <li class="nav-item">
            <a class="nav-link" href="#tags" role="tab" data-toggle="tab">
                {{ trans('cruds.tagManagement.tag.title') }}
            </a>
        </li>
        @endif
        @if(!is_null($product->hasProductWall)>0)
        <li class="nav-item">
            <a class="nav-link" href="#productWalls" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.product_wall.title') }}
            </a>
        </li>
        @endif
    </ul>
    <div class="tab-content">
        @if(!is_null($product->hasCategory)>0)
        <div class="tab-pane" role="tabpanel" id="categories">
            @includeIf('_relationships.categories', ['categories' => $product->hasCategory])
        </div>
        @endif
        @if(!is_null($product->hasTag)>0)
        <div class="tab-pane" role="tabpanel" id="tags">
            @includeIf('_relationships.tags', ['tags' => $product->hasTag])
        </div>
        @endif
        @if(!is_null($product->hasProductWall)>0)
        <div class="tab-pane" role="tabpanel" id="productWalls">
            @includeIf('_relationships.product-walls', ['productWalls' => $product->hasProductWall])
        </div>
        @endif
    </div>
</div>
@endsection
