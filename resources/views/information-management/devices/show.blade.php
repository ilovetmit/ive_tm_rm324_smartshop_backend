@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.informationManagement.device.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('InformationManagement.Devices.index') }}">
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
                            {{ $device->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.token') }}
                        </th>
                        <td>
                            {{ $device->token }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.user_id') }}
                        </th>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $device->hasUser->id . ". " . $device->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.is_active') }}
                        </th>
                        <td>
                            {{-- $device->is_active --}}
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => $device->is_active == 1 ? config('constant.device_isActive')['tag_type_1'] :
                            config('constant.device_isActive')['tag_type_2'],
                            'element' => config('constant.device_isActive')[$device->is_active] ?? '',
                            ])
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('InformationManagement.Devices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
