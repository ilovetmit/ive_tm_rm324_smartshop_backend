@extends('layouts.admin')
@section('content')
@can('role_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("UserManagement.Roles.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.userManagement.sub_title_2.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.userManagement.sub_title_2.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_2.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_2.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_2.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $role)
                    <tr data-entry-id="{{ $role->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $role->id ?? '' }}
                        </td>
                        <td>
                            {{ $role->name ?? '' }}
                        </td>
                        <td>
                            @foreach($role->hasPermission as $key => $item)
                            <span class="badge badge-info">{{ $item->title }}</span>
                            @endforeach
                        </td>
                        <td>
                            @can('role_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('UserManagement.Roles.show', $role->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('role_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('UserManagement.Roles.edit', $role->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('role_delete')
                            <form action="{{ route('UserManagement.Roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
@section('scripts')
@parent
@include('module.datatable.massdestory',[
    'permission_massDestory'    => 'role_delete',
    'route'                     => route('UserManagement.Roles.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-Role'
])
@endsection