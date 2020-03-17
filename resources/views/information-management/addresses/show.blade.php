@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.informationManagement.sub_title_1.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('InformationManagement.Addresses.index') }}">
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
                            {{ $address->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.user_id') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag_suffix',[
                            'type' => 'info',
                            'element' => $address->hasUser->id ?? '',
                            'suffix' => $address->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.district') }}
                        </th>
                        <td>
                            {{ $address->district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.address1') }}
                        </th>
                        <td>
                            {{ $address->address1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.address2') }}
                        </th>
                        <td>
                            {{ $address->address2 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('InformationManagement.Addresses.index') }}">
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
            <a class="nav-link" href="#addresses_users" role="tab" data-toggle="tab">
                {{ trans('cruds.userManagement.sub_title_3.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="addresses_users">
            @includeIf('InformationManagement.relationships.users', ['user' => $address->hasUser])
        </div>
    </div>
</div>
@endsection