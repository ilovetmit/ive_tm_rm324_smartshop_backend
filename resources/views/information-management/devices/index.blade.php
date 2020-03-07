@extends('layouts.admin')
@section('content')
@can('device_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("InformationManagement.Devices.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.informationManagement.sub_title_2.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.informationManagement.sub_title_2.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Device">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_2.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_2.fields.token') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_2.fields.user_id') }} -> show user name?
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_2.fields.is_active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($devices as $key => $device)
                    <tr data-entry-id="{{ $device->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $device->id ?? '' }}
                        </td>
                        <td>
                            {{ $device->token ?? '' }}
                        </td>
                        <td>
                            {{ $device->user->first_name ?? '' }} {{ $device->user->last_name ?? '' }}
                        </td>
                        <td>
                            {{ $device->is_active ?? '' }}
                        </td>
                        <td>
                            <!-- which can allow to do -->
                            @can('device_view_cannot')
                            <a class="btn btn-xs btn-primary" href="{{ route('InformationManagement.Devices.show', $device->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('device_edit_cannot')
                            <a class="btn btn-xs btn-info" href="{{ route('InformationManagement.Devices.edit', $device->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('device_delete_cannot')
                            <form action="{{ route('InformationManagement.Devices.destroy', $device->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    'permission_massDestory'    => 'device_delete',
    'route'                     => route('InformationManagement.Devices.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-Device'
])
@endsection