@extends('_layout.admin')
@section('content')
@can('address_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("InformationManagement.Addresses.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.informationManagement.address.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.informationManagement.address.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Address">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.district') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addresses as $key => $address)
                    <tr data-entry-id="{{ $address->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $address->id ?? '' }}
                        </td>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['name'],
                            'element' => $address->hasUser->id . ". " . $address->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                        <td>
                            {{ config('constant.address_district')[$address->district] ?? '' }}
                        </td>
                        <td>
                            @include('_module.datatable.action.index',[
                            'permission_subject' => 'address',
                            'route_subject' => 'InformationManagement.Addresses',
                            'id' => $address->id
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
'permission_massDestory' => 'address_delete',
'route' => route('InformationManagement.Addresses.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Address'
])
@endsection
