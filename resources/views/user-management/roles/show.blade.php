@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userManagement.role.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('UserManagement.Roles.index') }}">
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
                            {{ $role->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.name') }}
                        </th>
                        <td>
                            {{ $role->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.description') }}
                        </th>
                        <td>
                            {{ $role->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.permission') }}
                        </th>
                        <td>
                            @foreach($role->hasPermission as $key => $permissions)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $permissions->name ?? '',
                            ])
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('UserManagement.Roles.index') }}">
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
        @if(!is_null($role->hasUser)>0)
        <li class="nav-item">
            <a class="nav-link" href="#users" role="tab" data-toggle="tab">
                {{ trans('cruds.userManagement.user.title') }}
            </a>
        </li>
        @endif
    </ul>
    <div class="tab-content">
        @if(!is_null($role->hasUser)>0)
        <div class="tab-pane" role="tabpanel" id="users">
            @includeIf('relationships.users', ['users' => $role->hasUser])
        </div>
        @endif
    </div>
</div>
@endsection