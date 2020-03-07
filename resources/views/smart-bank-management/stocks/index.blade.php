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
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.icon') }}
                        </th>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.data') }}
                        </th>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.description') }}
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
                            {{ $stock->icon ?? '' }}
                        </td>
                        <td>
                            {{ $stock->name ?? '' }}
                        </td>
                        <td>
                            {{ $stock->data ?? '' }}
                        </td>
                        <td>
                            {{ $stock->description ?? '' }}
                        </td>
                        <td>
                            @can('stock_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('SmartBankManagement.Stocks.show', $stock->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('stock_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('SmartBankManagement.Stocks.edit', $stock->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('stock_delete')
                            <form action="{{ route('SmartBankManagement.Stocks.destroy', $stock->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    'permission_massDestory'    => 'stock_delete',
    'route'                     => route('SmartBankManagement.Stocks.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-Stock'
])
@endsection