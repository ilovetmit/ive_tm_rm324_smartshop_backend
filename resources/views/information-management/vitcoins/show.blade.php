@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.informationManagement.vitcoin.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('InformationManagement.Vitcoins.index') }}">
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
                            {{ $vitcoin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.user_id') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag_suffix',[
                            'type' => 'info',
                            'element' => $vitcoin->hasUser->id ?? '',
                            'suffix' => $vitcoin->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.address') }}
                        </th>
                        <td>
                            {{ $vitcoin->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.primary_key') }}
                        </th>
                        <td>
                            {{ $vitcoin->primary_key }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('InformationManagement.Vitcoins.index') }}">
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
            <a class="nav-link" href="#vitcoins_users" role="tab" data-toggle="tab">
                {{ trans('cruds.userManagement.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vitcoins_users">
            @includeIf('information-management.relationships.user', ['user' => $interest->hasUser])
        </div>
    </div>
</div>
@endsection