@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transactionManagement.locker_transaction.title') }}
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
                    <!------------------------transaction_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.transaction_id') }}
                        </th>
                        <td>
                            {{-- $lockerTransaction->transaction_id ?? '' --}}
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $lockerTransaction->hasTransaction->id . ". " .
                            $lockerTransaction->hasTransaction->header . "." ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------locker_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.locker_id') }}
                        </th>
                        <td>
                            {{-- $lockerTransaction->locker_id ?? '' --}}
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => "Locker No. " . $lockerTransaction->locker_id ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------recipient_user_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.recipient_user_id') }}
                        </th>
                        <td>
                            {{-- $lockerTransaction->recipient_user_id ?? '' --}}
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $lockerTransaction->hasUser->id . ". " .
                            $lockerTransaction->hasUser->getFullNameAttribute() . "." ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------item------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.item') }}
                        </th>
                        <td>
                            {{ $lockerTransaction->item ?? '' }}
                        </td>
                    </tr>
                    <!------------------------deadline------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.deadline') }}
                        </th>
                        <td>
                            {{ $lockerTransaction->deadline ?? '' }}
                        </td>
                    </tr>
                    <!------------------------remark------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.remark') }}
                        </th>
                        <td>
                            {{ $lockerTransaction->remark ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TransactionManagement.LockerTransactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
