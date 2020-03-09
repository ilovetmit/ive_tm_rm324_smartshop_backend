@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.advertisementManagement.sub_title_1.title') }}
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
                    <tr>
                        <th>
                            {{ trans('cruds.advertisementManagement.sub_title_1.fields.id') }}
                        </th>
                        <td>
                            {{ $ad->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisementManagement.sub_title_1.fields.header') }}
                        </th>
                        <td>
                            {{ $ad->header }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisementManagement.sub_title_1.fields.image') }}
                        </th>
                        <td>
                            {{ $ad->image }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisementManagement.sub_title_1.fields.description') }}
                        </th>
                        <td>
                            {{ $ad->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisementManagement.sub_title_1.fields.status') }}
                        </th>
                        <td>
                            {{ $ad->status }}
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
            <a class="nav-link" href="#roles_users" role="tab" data-toggle="tab">
                {{ trans('cruds.advertisementManagement.sub_title_3.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="roles_users">
        </div>
    </div>
</div>

@endsection