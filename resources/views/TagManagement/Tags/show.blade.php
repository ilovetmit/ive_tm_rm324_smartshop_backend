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
                    <tr>
                        <th>
                            {{ trans('cruds.tagManagement.sub_title_1.fields.id') }}
                        </th>
                        <td>
                            {{ $tag->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tagManagement.sub_title_1.fields.name') }}
                        </th>
                        <td>
                            {{ $tag->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tagManagement.sub_title_1.fields.description') }}
                        </th>
                        <td>
                            {{ $tag->description }}
                        </td>
                    </tr>
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

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#tags_advertisement" role="tab" data-toggle="tab">
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
        <div class="tab-pane" role="tabpanel" id="tags_advertisement">
            @includeIf('TagManagement.Tags.relationships.tagsAdvertisements', ['advertisement' => $tag->hasAdvertisement])
        </div>
        <div class="tab-pane" role="tabpanel" id="tags_products">
            @includeIf('TagManagement.Tags.relationships.tagsProducts', ['product' => $tag->hasProduct])
        </div>
    </div>
</div>

@endsection