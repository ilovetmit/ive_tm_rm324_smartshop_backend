@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transactionManagement.locker_transaction.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TransactionManagement.Transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <!------------------------transaction_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.transaction_id') }}
                        </th>
                        <td>
                            {{ $lockerTransaction->transaction_id ?? '' }}
                        </td>
                    </tr>
                    <!------------------------locker_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.locker_id') }}
                        </th>
                        <td>
                            {{ $lockerTransaction->locker_id ?? '' }}
                        </td>
                    </tr>
                    <!------------------------recipient_user_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.recipient_user_id') }}
                        </th>
                        <td>
                            {{ $lockerTransaction->recipient_user_id ?? '' }}
                        </td>
                    </tr>
                    <!------------------------item------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.item') }}
                        </th>
                        <td>
                            {{ $lockerTransaction->item ?? '' }}
                        </td>
                    </tr>
                    <!------------------------deadline------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.deadline') }}
                        </th>
                        <td>
                            {{ $lockerTransaction->deadline ?? '' }}
                        </td>
                    </tr>
                    <!------------------------remark------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.remark') }}
                        </th>
                        <td>
                            {{ $lockerTransaction->remark ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TransactionManagement.LockerTransactions.index') }}">
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
        <li class="nav-item">
            <a class="nav-link" href="#transactions_users" role="tab" data-toggle="tab">
                {{ trans('cruds.userManagement.user.title') }}
            </a>
        </li>
        <li>
            <a class="nav-link" href="#transactions_users" role="tab" data-toggle="tab">
                {{ trans('cruds.transactionManagement.transaction.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="transactions_users">
            @includeIf('transaction-management.relationships.user', ['user' => $lockerTransaction->hasUser])
        </div>
        <div class="tab-pane" role="tabpanel" id="transactions_locker_transactions">
            @includeIf('transaction-management.transactions.relationships.transactions', ['transaction' => $lockerTransaction->hasTransaction])
        </div>
    </div>
</div>
@endsection