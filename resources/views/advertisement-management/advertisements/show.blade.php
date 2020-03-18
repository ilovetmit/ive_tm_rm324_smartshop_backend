@extends('layouts.admin')
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
                            @include('module.datatable.badge_tag.tag',[
                            'type' => $ad->status == 1 ? config('constant.advertisement_status')['tag_type_1'] : config('constant.advertisement_status')['tag_type_2'],
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
                                @include('module.datatable.badge_tag.tag',[
                                'type' => 'info',
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
<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#advertisements-tags" role="tab" data-toggle="tab">
                {{ trans('cruds.tagManagement.tag.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="advertisements-tags">
            @includeIf('advertisement-management.advertisements.relationships.advertisements-tags', ['tags' => $ad->hasTag])
        </div>
    </div>
</div>
@endsection