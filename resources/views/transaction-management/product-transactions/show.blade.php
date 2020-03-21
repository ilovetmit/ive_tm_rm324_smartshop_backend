@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transactionManagement.product_transaction.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TransactionManagement.ProductTransactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <!------------------------transaction_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.header') }}
                        </th>
                        <td>
                            {{ $productTransaction->transaction_id ?? '' }}
                        </td>
                    </tr>
                    <!------------------------product_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.user_id') }}
                        </th>
                        <td>
                            {{ $productTransaction->product_id ?? '' }}
                        </td>
                    </tr>
                    <!------------------------quantity------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.quantity') }}
                        </th>
                        <td>
                            {{ $productTransaction->quantity ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TransactionManagement.ProductTransactions.index') }}">
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
            <a class="nav-link" href="#transactions_product_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transactionManagement.product_transaction.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#transactions_products" role="tab" data-toggle="tab">
                {{ trans('cruds.productManagement.product.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="transactions_locker_transactions">
            @includeIf('transaction-management.relationships.transaction-undefine', ['transaction' => $productTransaction->hasTransaction])
        </div>
        <div class="tab-pane" role="tabpanel" id="transactions_product_transactions">
            @includeIf('transaction-management.relationships.product-undefine', ['product' => $productTransaction->hasProduct])
        </div>
    </div>
</div>
@endsection