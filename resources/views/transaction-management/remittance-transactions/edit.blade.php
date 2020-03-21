@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transactionManagement.remittance_transaction.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("TransactionManagement.RemittanceTransactions.update", [$remittanceTransaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-- -------------------transaction_id------------------- -->
            <div class="form-group">
                <label class="required" for="transaction_id">{{ trans('cruds.fields.transaction_id') }}</label>
                <select class="form-control select {{ $errors->has('transaction_id') ? 'is-invalid' : '' }}" name="transaction_id" id="transaction_id" required>
                    <option value disabled {{ old('transaction_id', $remittanceTransaction->transaction_id) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
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
            <!-- -------------------remittee_id------------------- -->
            <div class="form-group">
                <label class="required" for="remittee_id">{{ trans('cruds.fields.remittee_id') }}</label>
                <select class="form-control select {{ $errors->has('remittee_id') ? 'is-invalid' : '' }}" name="remittee_id" id="remittee_id" required>
                    <option value disabled {{ old('remittee_id', $remittanceTransaction->remittee_id) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($users as $key => $user)
                    <option value="{{ $user->id }}" {{ old('remittee_id', '') === (string) $key ? 'selected' : '' }}>
                        {{ $user->id . $user->name }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('remittee_id'))
                <span class="text-danger">{{ $errors->first('remittee_id') }}</span>
                @endif
                <span class="help-block"></span>
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