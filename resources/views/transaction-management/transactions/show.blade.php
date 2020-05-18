@extends('_layout.admin')
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
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $transaction->hasUser->id . ". " .
                            $transaction->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------amount------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.amount') }}
                        </th>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
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
                            @include('_module.datatable.badge_tag.tag',[
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
                            @include('_module.datatable.badge_tag.tag',[
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
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => "Locker Transaction" ?? '',
                            ])
                            @elseif(!is_null($transaction->hasProduct_transaction)>0)
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => "Product Transaction" ?? '',
                            ])
                            @elseif(!is_null($transaction->hasRemittance_transaction)>0)
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => "Remittannce Transaction" ?? '',
                            ])
                            @include('_module.datatable.badge_tag.tag',[
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
@endsection
