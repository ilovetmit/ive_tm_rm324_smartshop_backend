@extends('layouts.admin')
@section('content')
@can('insurance_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("SmartBankManagement.Insurances.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.smartBankManagement.sub_title_1.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.smartBankManagement.sub_title_1.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Insurance">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($insurances as $key => $insurance)
                    <tr data-entry-id="{{ $insurance->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $insurance->id ?? '' }}
                        </td>
                        <td>
                            {{ $insurance->name ?? '' }}
                        </td>
                        <td>
                            {{ $insurance->description ?? '' }}
                        </td>
                        <td>
                            @include('module.datatable.action.index',[
                            'permission_subject' => 'insurance',
                            'route_subject' => 'SmartBankManagement.Insurances',
                            'id' => $insurance->id
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
@include('module.datatable.massdestory',[
'permission_massDestory' => 'insurance_delete',
'route' => route('SmartBankManagement.Insurances.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Insurance'
])
@endsection