@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lockerManagement.locker.title') }}
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
                            <img src="{{ 'https://chart.apis.google.com/chart?cht=qr&chs=500x500&chld=L%7C0&chl=' . $locker->qrcode }}"
                                width="150px">
                            <br>
                            {{ $locker->qrcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.per_hour_price') }}
                        </th>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => '$ '. $locker->per_hour_price ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.is_active') }}
                        </th>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => $locker->is_active == 1 ? config('constant.locker_isActive')['tag_type_1'] :
                            config('constant.locker_isActive')['tag_type_2'],
                            'element' => config('constant.locker_isActive')[$locker->is_active] ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.is_using') }}
                        </th>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => $locker->is_using == 1 ? config('constant.locker_isUsing')['tag_type_1'] :
                            config('constant.locker_isUsing')['tag_type_2'],
                            'element' => config('constant.locker_isUsing')[$locker->is_using] ?? '',
                            ])
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
<!-- hasManyTable -->
<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        @if(!is_null($locker->hasLockerTransaction)>0)
        <li class="nav-item">
            <a class="nav-link" href="#lockerTransactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transactionManagement.locker_transaction.title') }}
            </a>
        </li>
        @endif
    </ul>
    <div class="tab-content">
        @if(!is_null($locker->hasLockerTransaction)>0)
        <div class="tab-pane" role="tabpanel" id="lockerTransactions">
            @includeIf('_relationships.locker-transactions', ['lockerTransactions' => $locker->hasLockerTransaction])
        </div>
        @endif
    </div>
</div>
@endsection
