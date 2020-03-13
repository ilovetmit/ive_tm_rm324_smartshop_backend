@extends('layouts.admin')
@section('content')
@can('stock_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("SmartBankManagement.Stocks.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.smartBankManagement.sub_title_2.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.smartBankManagement.sub_title_2.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Stock">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stocks as $key => $stock)
                    <tr data-entry-id="{{ $stock->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $stock->id ?? '' }}
                        </td>
                        <td>
                            {{ $stock->code ?? '' }}
                        </td>
                        <td>
                            {{ $stock->name ?? '' }}
                        </td>
                        <td>
                            @include('module.datatable.action.index',[
                            'permission_subject' => 'stock',
                            'route_subject' => 'SmartBankManagement.Stocks',
                            'id' => $stock->id
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
'permission_massDestory' => 'stock_delete',
'route' => route('SmartBankManagement.Stocks.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Stock'
])
@endsection