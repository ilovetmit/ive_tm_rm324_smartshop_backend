@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transactionManagement.remittance_transaction.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TransactionManagement.RemittanceTransactions.index') }}">
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
                            {{ $remittanceTransaction->transaction_id ?? '' }}
                        </td>
                    </tr>
                    <!------------------------remittee_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.remittee_id') }}
                        </th>
                        <td>
                            {{ $remittanceTransaction->remittee_id ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TransactionManagement.RemittanceTransactions.index') }}">
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
            <a class="nav-link" href="#transactions_locker_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.userManagement.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#transactions_product_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transactionManagement.transaction.title') }}
            </a>
        </li>
     
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="transactions_users">
            @includeIf('transaction-management.relationships.user', ['user' => $remittanceTransaction->hasUser])
        </div>
        <div class="tab-pane" role="tabpanel" id="transactions_locker_transactions">
            @includeIf('transaction-management.transactions.relationships.transactions', ['transaction' => $remittanceTransaction->hasTransaction])
        </div>
    </div>
</div>
@endsection