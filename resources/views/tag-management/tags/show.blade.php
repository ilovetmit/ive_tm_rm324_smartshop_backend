@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tagManagement.tag.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TagManagement.Tags.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <!------------------------id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <td>
                            {{ $tag->id }}
                        </td>
                    </tr>
                    <!------------------------name------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.name') }}
                        </th>
                        <td>
                            {{ $tag->name }}
                        </td>
                    </tr>
                    <!------------------------descriptions------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.description') }}
                        </th>
                        <td>
                            {{ $tag->description }}
                        </td>
                    </tr>
                    <!------------------------------------------------>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TagManagement.Tags.index') }}">
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
        @if(!is_null($tag->hasAdvertisement)>0)
        <li class="nav-item">
            <a class="nav-link" href="#advertisements" role="tab" data-toggle="tab">
                {{ trans('cruds.advertisementManagement.advertisement.title') }}
            </a>
        </li>
        @endif
        @if(!is_null($tag->hasProduct)>0)
        <li class="nav-item">
            <a class="nav-link" href="#products" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.product.title') }}
            </a>
        </li>
        @endif
    </ul>
    <div class="tab-content">
        @if(!is_null($tag->hasAdvertisement)>0)
        <div class="tab-pane" role="tabpanel" id="advertisements">
            @includeIf('relationships.advertisement-s', ['ad' => $tag->hasAdvertisement])
        </div>
        @endif
        @if(!is_null($tag->hasProduct)>0)
        <div class="tab-pane" role="tabpanel" id="products">
            @includeIf('relationships.product-s', ['product' => $tag->hasProduct])
        </div>
        @endif
    </div>
</div>
@endsection