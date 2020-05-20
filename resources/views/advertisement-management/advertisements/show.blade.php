@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.advertisementManagement.advertisement.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('AdvertisementManagement.ad.index') }}">
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
                            {{ $ad->id }}
                        </td>
                    </tr>
                    <!------------------------header------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.header') }}
                        </th>
                        <td>
                            {{ $ad->header }}
                        </td>
                    </tr>
                    <!------------------------image------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.image') }}
                        </th>
                        <td>
                            <img src="{{ asset('storage/ad/ad/'.$ad->image) }}" width="150px">
                        </td>
                    </tr>
                    <!------------------------description------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.description') }}
                        </th>
                        <td>
                            {{ $ad->description }}
                        </td>
                    </tr>
                    <!------------------------status------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.status') }}
                        </th>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')[config('constant.advertisement_status')[$ad->status]],
                            'element' => config('constant.advertisement_status')[$ad->status] ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------tag------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.tag') }}
                        </th>
                        <td>
                            @foreach($ad->hasTag as $key => $tags)
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['name'],
                            'element' => $tags->name ?? '',
                            ])
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('AdvertisementManagement.ad.index') }}">
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
        @if(!is_null($ad->hasTag)>0)
        <li class="nav-item">
            <a class="nav-link" href="#tags" role="tab" data-toggle="tab">
                {{ trans('cruds.tagManagement.tag.title') }}
            </a>
        </li>
        @endif
    </ul>
    <div class="tab-content">
        @if(!is_null($ad->hasTag)>0)
        <div class="tab-pane" role="tabpanel" id="tags">
            @includeIf('_relationships.tags', ['tags' => $ad->hasTag])
        </div>
        @endif
    </div>
</div>
@endsection
