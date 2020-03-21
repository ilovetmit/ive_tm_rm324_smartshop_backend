@extends('layouts.admin')
@section('content')
@can('product_transaction_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("TransactionManagement.Transactions.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.transactionManagement.transaction.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transactionManagement.transaction.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Product-Transaction">
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
                            {{ trans('cruds.fields.product_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.quantity') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productTransactions as $key => $productTransaction)
                    <tr data-entry-id="{{ $productTransaction->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $productTransaction->id ?? '' }}
                        </td>
                        <td>
                            {{ $productTransaction->transaction_id ?? '' }}
                        </td>
                        <td>
                            {{ $productTransaction->product_id ?? '' }}
                        </td>
                        <td>
                            {{ $productTransaction->quantity ?? '' }}
                        </td>
                        <td>
                            @include('module.datatable.action.index',[
                            'permission_subject' => 'product_transaction',
                            'route_subject' => 'TransactionManagement.ProductTransactions',
                            'id' => $productTransaction->id
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
'permission_massDestory' => 'product_transaction_delete',
'route' => route('TransactionManagement.Transactions.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Product-Transaction'
])
@endsection
