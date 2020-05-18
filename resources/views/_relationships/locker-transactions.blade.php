<div class="m-3">
    @can('locker_transaction_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("TransactionManagement.LockerTransactions.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.transactionManagement.locker_transaction.title') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.transactionManagement.locker_transaction.title') }} {{ trans('global.list') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-LockerTransaction">
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
                                {{ trans('cruds.fields.locker_id') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.recipient_user_id') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.deadline') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lockerTransactions as $key => $lockerTransaction)
                        <tr data-entry-id="{{ $lockerTransaction->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $lockerTransaction->id ?? '' }}
                            </td>
                            <td>
                                {{-- $lockerTransaction->transaction_id ?? '' --}}
                                @include('_module.datatable.badge_tag.tag',[
                                'type' => 'info',
                                'element' => $lockerTransaction->hasTransaction->id . ". " .
                                $lockerTransaction->hasTransaction->header . "." ?? '',
                                ])
                            </td>
                            <td>
                                {{-- $lockerTransaction->locker_id ?? '' --}}
                                @include('_module.datatable.badge_tag.tag',[
                                'type' => 'info',
                                'element' => "Locker No. " . $lockerTransaction->locker_id ?? '',
                                ])
                            </td>
                            <td>
                                {{-- $lockerTransaction->recipient_user_id ?? '' --}}
                                @include('_module.datatable.badge_tag.tag',[
                                'type' => 'info',
                                'element' => $lockerTransaction->hasUser->id . ". " .
                                $lockerTransaction->hasUser->getFullNameAttribute() . "." ?? '',
                                ])
                            </td>
                            <td>
                                {{ $lockerTransaction->deadline ?? '' }}
                            </td>
                            <td>
                                @include('_module.datatable.action.index',[
                                'permission_subject' => 'locker_transaction',
                                'route_subject' => 'TransactionManagement.LockerTransactions',
                                'id' => $lockerTransaction->id
                                ])
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
@include('_module.datatable.massdestory',[
'permission_massDestory' => 'locker_transaction_delete',
'route' => route('TransactionManagement.LockerTransactions.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-LockerTransaction'
])
@endsection
