@extends('_layout.admin')
@section('content')
@can('transaction_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("TransactionManagement.RemittanceTransactions.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.transactionManagement.remittance_transaction.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transactionManagement.remittance_transaction.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Remittance-Transactions">
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
                            {{ trans('cruds.fields.payee_id') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($remittanceTransactions as $key => $remittanceTransaction)
                    <tr data-entry-id="{{ $remittanceTransaction->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $remittanceTransaction->id ?? '' }}
                        </td>
                        <td>
                            {{-- $remittanceTransaction->transaction_id ?? '' --}}
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['header'],
                            'element' => $remittanceTransaction->hasTransaction->id . ". " .
                            $remittanceTransaction->hasTransaction->header ?? '',
                            ])
                        </td>
                        <td>
                            {{-- $remittanceTransaction->payee_id ?? '' --}}
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['name'],
                            'element' => $remittanceTransaction->hasUser->id . ". " .
                            $remittanceTransaction->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                        <td>
                            @include('_module.datatable.action.index',[
                            'permission_subject' => 'remittance_transaction',
                            'route_subject' => 'TransactionManagement.RemittanceTransactions',
                            'id' => $remittanceTransaction->id
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
@include('_module.datatable.massdestory',[
'permission_massDestory' => 'remittance_transaction_delete',
'route' => route('TransactionManagement.RemittanceTransactions.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Remittance-Transactions'
])
@endsection
