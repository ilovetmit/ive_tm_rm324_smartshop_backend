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
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.id') }}
                        </th>
                        <td>
                            {{ $stock->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.code') }}
                        </th>
                        <td>
                            {{ $stock->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.icon') }}
                        </th>
                        <td>
                            {{ $stock->icon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.name') }}
                        </th>
                        <td>
                            {{ $stock->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.data') }}
                        </th>
                        <td>
                            {{ $stock->data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_2.fields.description') }}
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