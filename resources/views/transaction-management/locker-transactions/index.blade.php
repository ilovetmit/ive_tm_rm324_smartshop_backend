@extends('layouts.admin')
@section('content')
@can('transaction_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("TransactionManagement.LockerTransactions.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.transactionManagement.locker_transaction.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transactionManagement.locker_transaction.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Locker-Transaction">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.transaction_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.locker_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.recipient_user_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.item') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.deadline') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.remark') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lockerTransactions as $key => $lockerTransaction)
                    <tr data-entry-id="{{ $lockerTransaction->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $lockerTransaction->id ?? '' }}
                        </td>
                        <td>
                            {{ $lockerTransaction->transaction_id ?? '' }}
                        </td>
                        <td>
                            {{ $lockerTransaction->locker_id ?? '' }}
                        </td>
                        <td>
                            {{ $lockerTransaction->recipient_user_id ?? '' }}
                        </td>
                        <td>
                            {{ $lockerTransaction->item ?? '' }}
                        </td>
                        <td>
                            {{ $lockerTransaction->deadline ?? '' }}
                        </td>
                        <td>
                            {{ $lockerTransaction->remark ?? '' }}
                        </td>
                        
                        <td>
                            @include('module.datatable.action.index',[
                            'permission_subject' => 'locker_transaction',
                            'route_subject' => 'TransactionManagement.LockerTransactions',
                            'id' => $lockerTransaction->id
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
@include('module.datatable.massdestory',[
'permission_massDestory' => 'locker_transaction_delete',
'route' => route('TransactionManagement.LockerTransactions.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Locker-Transaction'
])
@endsection
