@extends('_layout.admin')
@section('content')
@can('transaction_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <!-- <a class="btn btn-success" href="{{ route("TransactionManagement.Transactions.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.transactionManagement.transaction.title') }}
        </a> -->
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transactionManagement.transaction.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Transaction">
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
                            {{ trans('cruds.fields.user') }}
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
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['name'],
                            'element' => $transaction->hasUser->id . ". " .
                            $transaction->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                        <td>
                            {{ '$ '. $transaction->amount ?? '' }}

                        </td>
                        <td>
                            <!-- user for demo case -->
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
                            @else
                                @include('_module.datatable.badge_tag.tag',[
                                    'type' => config('constant.badge_type')['pt'],
                                    'element' => "Product Transaction" ?? '',
                                ])
                            @endif
                            <!-- end of user for demo case -->
                            {{-- 
                            <!-- user for actual case -->
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
                            @endif
                            <!-- end of user for actual case -->
                            --}}
                        </td>
                        <td>
                            @include('_module.datatable.action.index',[
                            'permission_subject' => 'transaction',
                            'route_subject' => 'TransactionManagement.Transactions',
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
@include('_module.datatable.massdestory',[
'permission_massDestory' => 'transaction_delete',
'route' => route('TransactionManagement.Transactions.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Transaction'
])
@endsection
