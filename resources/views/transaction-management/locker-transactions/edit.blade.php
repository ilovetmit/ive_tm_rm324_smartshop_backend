@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transactionManagement.locker_transaction.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("TransactionManagement.LockerTransaction.update", [$lockerTransaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-- -----------------transaction_id----------------- -->
            <div class="form-group">
                <label class="required" for="transaction_id">{{ trans('cruds.fields.transaction_id') }}</label>
                <select class="form-control select2 {{ $errors->has('transaction_id') ? 'is-invalid' : '' }}" name="transaction_id" id="transaction_id" required>
                    <option value disabled {{ old('transaction_id', $lockerTransaction->transaction_id) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($transactions as $key => $transaction)
                    <option value="{{ $transaction->id }}" {{ old('transaction_id', '') === (string) $key ? 'selected' : '' }}>
                        {{ $transaction->id . $transaction->header }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('transaction_id'))
                <span class="text-danger">{{ $errors->first('transaction_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- -----------------locker_id----------------- -->
            <div class="form-group">
                <label class="required" for="locker_id">{{ trans('cruds.fields.locker_id') }}</label>
                <select class="form-control select2 {{ $errors->has('locker_id') ? 'is-invalid' : '' }}" name="locker_id" id="locker_id" required>
                    <option value disabled {{ old('locker_id', $lockerTransaction->locker_id) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($lockers as $key => $locker)
                    <option value="{{ $locker->id }}" {{ old('locker_id', '') === (string) $key ? 'selected' : '' }}>
                        Locker {{ $locker->id }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('locker_id'))
                <span class="text-danger">{{ $errors->first('locker_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- -----------------recipient_user_id----------------- -->
            <div class="form-group">
                <label class="required" for="recipient_user_id">{{ trans('cruds.fields.recipient_user_id') }}</label>
                <select class="form-control select2 {{ $errors->has('recipient_user_id') ? 'is-invalid' : '' }}" name="recipient_user_id" id="recipient_user_id" required>
                    <option value disabled {{ old('recipient_user_id', $lockerTransaction->recipient_user_id) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($users as $key => $user)
                    <option value="{{ $user->id }}" {{ old('recipient_user_id', '') === (string) $key ? 'selected' : '' }}>
                        {{ $user->getFullNameAttribute() }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('recipient_user_id'))
                <span class="text-danger">{{ $errors->first('recipient_user_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- -----------------item----------------- -->
            <div class="form-group">
                <label class="required" for="item">{{ trans('cruds.fields.item') }}</label>
                <input class="form-control {{ $errors->has('item') ? 'is-invalid' : '' }}" type="text" name="item" id="item" value="{{ old('item', $lockerTransaction->item) }}" required>
                @if($errors->has('item'))
                <span class="text-danger">{{ $errors->first('item') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-- -----------------deadline----------------- -->
            <div class="form-group">
                <label class="required" for="deadline">{{ trans('cruds.fields.deadline') }}</label>
                <input class="form-control data {{ $errors->has('deadline') ? 'is-invalid' : '' }}" type="text" name="deadline" id="deadline" value="{{ old('deadline', $lockerTransaction->deadline) }}" required>
                @if($errors->has('deadline'))
                <span class="text-danger">{{ $errors->first('deadline') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-- -----------------remark----------------- -->
            <div class="form-group">
                <label class="required" for="remark">{{ trans('cruds.fields.remark') }}</label>
                <input class="form-control {{ $errors->has('remark') ? 'is-invalid' : '' }}" type="text" name="remark" id="remark" value="{{ old('remark', $lockerTransaction->remark) }}" required>
                @if($errors->has('remark'))
                <span class="text-danger">{{ $errors->first('remark') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-------------------------------------------------------------------------->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection