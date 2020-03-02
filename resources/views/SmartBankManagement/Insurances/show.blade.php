@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.smartBankManagement.sub_title_1.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('SmartBankManagement.Insurances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_1.fields.id') }}
                        </th>
                        <td>
                            {{ $insurance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_1.fields.name') }}
                        </th>
                        <td>
                            {{ $insurance->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_1.fields.price') }}
                        </th>
                        <td>
                            {{ $insurance->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_1.fields.image') }}
                        </th>
                        <td>
                            {{ $insurance->image }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_1.fields.description') }}
                        </th>
                        <td>
                            {{ $insurance->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('SmartBankManagement.Insurances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection