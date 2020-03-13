@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.smartBankManagement.sub_title_2.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('SmartBankManagement.Stocks.index') }}">
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
                            {{ $stock->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.code') }}
                        </th>
                        <td>
                            {{ $stock->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.icon') }}
                        </th>
                        <td>
                            <img src="{{ asset('storage/stocks/icon/'.$stock->icon) }}" width="150px">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.name') }}
                        </th>
                        <td>
                            {{ $stock->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.data') }}
                        </th>
                        <td>
                            {{ $stock->data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.description') }}
                        </th>
                        <td>
                            {{ $stock->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('SmartBankManagement.Stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection