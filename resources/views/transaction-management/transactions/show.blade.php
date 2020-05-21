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
                            'type' => config('constant.badge_type')['name'],
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
                            'type' => config('constant.badge_type')['amount'],
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
                            'type' => config('constant.badge_type')['balance'],
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
                            'type' => config('constant.badge_type')['currency'],
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
                            <!-- demo case -->
                            @if (fmod($transaction->id,4) == 0)
                                @include('_module.datatable.badge_tag.tag',[
                                    'type' => config('constant.badge_type')['lt'],
                                    'element' => "Locker Transaction" ?? '',
                                ])
                            @elseif (fmod($transaction->id,3) == 0)
                                @include('_module.datatable.badge_tag.tag',[
                                    'type' => config('constant.badge_type')['pt'],
                                    'element' => "Product Transaction" ?? '',
                                ])
                            @elseif (fmod($transaction->id,2) == 0)
                                @include('_module.datatable.badge_tag.tag',[
                                    'type' => config('constant.badge_type')['rt'],
                                    'element' => "Remittannce Transaction" ?? '',
                                    ])
                                @include('_module.datatable.badge_tag.tag',[
                                    'type' => config('constant.badge_type')['name'],
                                    'element' => '11. Smart Shop TMIT VTC',
                                ])
                            @else
                                @include('_module.datatable.badge_tag.tag',[
                                    'type' => config('constant.badge_type')['pt'],
                                    'element' => "Product Transaction" ?? '',
                                ])
                            @endif
                            <!-- end of demo case -->
                            {{--
                            <!-- actuall case -->
                            @if(!is_null($transaction->hasLocker_transaction)>0)
                                @include('_module.datatable.badge_tag.tag',[
                                    'type' => config('constant.badge_type')['lt'],
                                    'element' => "Locker Transaction" ?? '',
                                ])
                            @elseif(!is_null($transaction->hasProduct_transaction)>0)
                                @include('_module.datatable.badge_tag.tag',[
                                    'type' => config('constant.badge_type')['pt'],
                                    'element' => "Product Transaction" ?? '',
                                ])
                            @elseif(!is_null($transaction->hasRemittance_transaction)>0)
                                @include('_module.datatable.badge_tag.tag',[
                                    'type' => config('constant.badge_type')['rt'],
                                    'element' => "Remittannce Transaction" ?? '',
                                ])
                                @include('_module.datatable.badge_tag.tag',[
                                    'type' => config('constant.badge_type')['name'],
                                    'element' => $transaction->hasRemittance_transaction->hasUser->getFullNameAttribute() ?? '',
                                ])
                            @endif
                            <!-- end of actuall case -->
                            --}}
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
