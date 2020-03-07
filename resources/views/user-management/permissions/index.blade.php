@extends('layouts.admin')
@section('content')
@can('permission_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("UserManagement.Permissions.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.userManagement.sub_title_1.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.userManagement.sub_title_1.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_1.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_1.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key => $permission)
                    <tr data-entry-id="{{ $permission->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $permission->id ?? '' }}
                        </td>
                        <td>
                            {{ $permission->name ?? '' }}
                        </td>
                        <td>
                            @can('permission_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('UserManagement.Permissions.show', $permission->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('permission_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('UserManagement.Permissions.edit', $permission->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('permission_delete')
                            <form action="{{ route('UserManagement.Permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    'permission_massDestory'    => 'permission_delete',
    'route'                     => route('UserManagement.Permissions.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-Permission'
])
@endsection