@extends('_layout.admin')
@section('content')
@can('locker_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("LockerManagement.Lockers.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.lockerManagement.locker.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.lockerManagement.locker.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Locker">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.per_hour_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.is_active') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.is_using') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lockers as $key => $locker)
                    <tr data-entry-id="{{ $locker->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $locker->id ?? '' }}
                        </td>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => '$ '. $locker->per_hour_price ?? '',
                            ])
                        </td>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => $locker->is_active == 1 ? config('constant.locker_isActive')['tag_type_1'] :
                            config('constant.locker_isActive')['tag_type_2'],
                            'element' => config('constant.locker_isActive')[$locker->is_active] ?? '',
                            ])
                        </td>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => $locker->is_using == 1 ? config('constant.locker_isUsing')['tag_type_1'] :
                            config('constant.locker_isUsing')['tag_type_2'],
                            'element' => config('constant.locker_isUsing')[$locker->is_using] ?? '',
                            ])
                        </td>
                        <td>
                            @include('_module.datatable.action.index',[
                            'permission_subject' => 'locker',
                            'route_subject' => 'LockerManagement.Lockers',
                            'id' => $locker->id
                            ])
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
@include('_module.datatable.massdestory',[
'permission_massDestory' => 'locker_delete',
'route' => route('LockerManagement.Lockers.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Locker'
])
@endsection
