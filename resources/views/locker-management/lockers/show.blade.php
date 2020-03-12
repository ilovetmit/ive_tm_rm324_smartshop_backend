@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lockerManagement.sub_title_1.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('LockerManagement.Lockers.index') }}">
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
                            {{ $locker->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.qrcode') }}
                        </th>
                        <td>
                            {{ $locker->qrcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.per_hour_price') }}
                        </th>
                        <td>
                            {{ $locker->per_hour_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.is_active') }}
                        </th>
                        <td>
                            {{ $locker->is_active }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.is_using') }}
                        </th>
                        <td>
                            {{ $locker->is_using }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('LockerManagement.Lockers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection