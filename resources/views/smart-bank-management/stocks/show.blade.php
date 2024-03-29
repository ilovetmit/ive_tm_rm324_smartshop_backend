@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.smartBankManagement.stock.title') }}
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
                            <img src="{{ asset($stock->icon[0]) }}" width="150px">
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
                            @foreach($stock->data as $key => $data)
                                @include('_module.datatable.badge_tag.tag',[
                                'type' => config('constant.badge_type')['price'],
                                'element' => $stock->data[$key] ?? '',
                                ])
                            @endforeach
                            {{-- $stock->data --}}
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