@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transactionManagement.transaction.title') }}
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
                    <!------------------------header------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.header') }}
                        </th>
                        <td>
                            {{ $transaction->header ?? '' }}
                        </td>
                    </tr>
                    <!------------------------user_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.user_id') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag_suffix',[
                            'type' => 'info',
                            'element' => $transaction->hasUser->id ?? '',
                            'suffix' => $transaction->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------amount------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.amount') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => '$ '. $transaction->amount ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------balance------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.account_balance') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => '$ '. $transaction->balance ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------currency------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.currency') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => config('constant.transaction_currency')[$transaction->currency] ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------transaction_type------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.transaction_type') }}
                        </th>
                        <td>
                            @if(!is_null($transaction->hasLocker_transaction)>0)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => "Locker Transaction" ?? '',
                            ])
                            @elseif(!is_null($transaction->hasProduct_transaction)>0)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => "Product Transaction" ?? '',
                            ])
                            @elseif(!is_null($transaction->hasRemittance_transaction)>0)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => "Remittannce Transaction" ?? '',
                            ])
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'primary',
                            'element' => $transaction->hasRemittance_transaction->hasUser->getFullNameAttribute() ?? '',
                            ])
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TransactionManagement.Transactions.index') }}">
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
            <a class="nav-link" href="#transactions_locker_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transactionManagement.locker_transaction.title') }}
            </a>
        </li>
        <li>
            <a class="nav-link" href="#transactions_product_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transactionManagement.product_transaction.title') }}
            </a>
        </li>
        <li>
            <a class="nav-link" href="#transactions_remittance_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transactionManagement.remittance_transaction.title') }}
            </a>
        </li>
        <li>
            <a class="nav-link" href="#transactions_products" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.product.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="transactions_users">
            @includeIf('transaction-management.relationships.user', ['user' => $transaction->hasUser])
        </div>
        <div class="tab-pane" role="tabpanel" id="transactions_locker_transactions">
            @includeIf('transaction-management.transactions.relationships.locker-transactions', ['locker_transactions' => $transaction->hasLockerTransaction])
        </div>
        <div class="tab-pane" role="tabpanel" id="transactions_product_transactions">
            @includeIf('transaction-management.transactions.relationships.product-transactions', ['product_transactions' => $transaction->hasLockerTransaction])
        </div>
        <div class="tab-pane" role="tabpanel" id="transactions_remittance_transactions">
            @includeIf('transaction-management.transactions.relationships.remittance-transactions', ['remittance_transactions' => $transaction->hasLockerTransaction])
        </div>
        <div class="tab-pane" role="tabpanel" id="transactions_products">
            @includeIf('transaction-management.transactions.relationships.products', ['products' => $transaction->hasLockerTransaction])
        </div>
    </div>
</div>
@endsection