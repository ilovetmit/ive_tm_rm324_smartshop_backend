@extends('layouts.admin')
@section('content')
@can('transaction_create')
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
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.header') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.user_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.transaction_type') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $key => $transaction)
                    <tr data-entry-id="{{ $transaction->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $transaction->id ?? '' }}
                        </td>
                        <td>
                            {{ $transaction->header ?? '' }}
                        </td>
                        <td>
                            {{ $transaction->user_id ?? '' }}
                        </td>
                        <td>
                            {{ $transaction->amount ?? '' }}
                        </td>
                        <td>
                            @foreach($transaction->hasRole as $key => $item)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => $item->name == 'Admin' ? 'danger' : 'info',
                            'element' => $item->name ?? '',
                            ])
                            @endforeach
                        </td>
                        <td>
                            @include('module.datatable.action.index',[
                            'permission_subject' => 'user',
                            'route_subject' => 'UserManagement.Users',
                            'id' => $transaction->id
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
'permission_massDestory' => 'transaction_delete',
'route' => route('TransactionManagement.Transactions.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-User'
])
@endsection