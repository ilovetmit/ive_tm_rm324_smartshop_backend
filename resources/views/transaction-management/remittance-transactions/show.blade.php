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
                            {{-- $remittanceTransaction->transaction_id ?? '' --}}
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $remittanceTransaction->hasTransaction->id . ". " . $remittanceTransaction->hasTransaction->header ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------payee_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.payee_id') }}
                        </th>
                        <td>
                            {{-- $remittanceTransaction->payee_id ?? '' --}}
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $remittanceTransaction->hasUser->id . ". " . $remittanceTransaction->hasUser->getFullNameAttribute() ?? '',
                            ])
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
@endsection