@extends('layouts.admin')
@section('content')
@can('address_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("InformationManagement.Addresses.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.informationManagement.sub_title_1.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.informationManagement.sub_title_1.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Address">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_1.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_1.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_1.fields.district') }}
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
                            {{ $address->hasUser->getFullNameAttribute() ?? '' }}
                        </td>
                        <td>
                            {{ config('constant.address_district')[$address->district] ?? '' }}
                        </td>
                        <td>
                            @can('address_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('InformationManagement.Addresses.show', $address->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('address_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('InformationManagement.Addresses.edit', $address->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('address_delete')
                            <form action="{{ route('InformationManagement.Addresses.destroy', $address->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    'permission_massDestory'    => 'address_delete',
    'route'                     => route('InformationManagement.Addresses.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-Address'
])
@endsection