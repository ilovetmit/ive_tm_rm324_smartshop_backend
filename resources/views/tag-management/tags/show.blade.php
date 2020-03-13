@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tagManagement.sub_title_1.title') }}
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
        <li class="nav-item">
            <a class="nav-link" href="#tags_advertisements" role="tab" data-toggle="tab">
                {{ trans('cruds.advertisementManagement.sub_title_1.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tags_products" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.sub_title_1.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="tags_advertisements">
            @includeIf('tag-management.tags.relationships.tags-advertisements', ['ad' => $tag->hasAdvertisement])
        </div>
        <div class="tab-pane" role="tabpanel" id="tags_products">
            @includeIf('tag-management.tags.relationships.tags-products', ['product' => $tag->hasProduct])
        </div>
    </div>
</div>
@endsection