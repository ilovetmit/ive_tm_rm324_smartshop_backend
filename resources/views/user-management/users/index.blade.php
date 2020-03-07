@extends('layouts.admin')
@section('content')
@can('user_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("UserManagement.Users.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.userManagement.sub_title_3.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.userManagement.sub_title_3.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.email_verified_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.role') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr data-entry-id="{{ $user->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $user->id ?? '' }}
                        </td>
                        <td>
                            {{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}
                        </td>
                        <td>
                            {{ $user->email ?? '' }}
                        </td>
                        <td>
                            {{ $user->email_verified_at ?? '' }}
                        </td>
                        <td>
                            @foreach($user->hasRole as $key => $item)
                            <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @can('user_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('UserManagement.Users.show', $user->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('user_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('UserManagement.Users.edit', $user->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('user_delete')
                            <form action="{{ route('UserManagement.Users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@include('module.datatable.massdestory',[
    'permission_massDestory'    => 'user_delete',
    'route'                     => route('UserManagement.Users.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-User'
])
@endsection