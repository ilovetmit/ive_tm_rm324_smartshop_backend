<div class="m-3">
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
                <table class=" table table-bordered table-striped table-hover datatable datatable-user-Device">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.is_active') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.token') }}
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
                                @include('module.datatable.badge_tag.tag',[
                                'type' => $device->is_active == 1 ? config('constant.device_isActive')['tag_type_1'] : config('constant.device_isActive')['tag_type_2'],
                                'element' => config('constant.device_isActive')[$device->is_active] ?? '',
                                ])
                            </td>
                            <td>
                                {{ $device->token ?? '' }}
                            </td>
                            <td>
                                @include('module.datatable.action.index',[
                                'permission_subject' => 'device',
                                'route_subject' => 'InformationManagement.Devices',
                                'id' => $device->id
                                ])
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
@include('module.datatable.massdestory',[
'permission_massDestory' => 'device_delete',
'route' => route('InformationManagement.Devices.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-user-Device'
])
@endsection