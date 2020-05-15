@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transactionManagement.transactions.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("TransactionManagement.Transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-- ----------------header---------------- -->
            <div class="form-group">
                <label class="required" for="header">{{ trans('cruds.fields.header') }}</label>
                <input class="form-control {{ $errors->has('header') ? 'is-invalid' : '' }}" type="text" name="header" id="header" value="{{ old('header', $transaction->header) }}" required>
                @if($errors->has('header'))
                <span class="text-danger">{{ $errors->first('header') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-- ----------------user_id---------------- -->
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.fields.user_id') }}</label>
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    <option value disabled {{ old('user_id', $transaction->user_id) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($users as $key => $user)
                    <option value="{{ $user->id }}" {{ old('user_id', '') === (string) $key ? 'selected' : '' }}>
                        {{ $user->getFullNameAttribute() }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- ----------------amount---------------- -->
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.fields.amount') }}</label>
                <input class="form-control data {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="text" name="amount" id="amount" value="{{ old('amount', $transaction->amount) }}" required>
                @if($errors->has('amount'))
                <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-- ----------------balance---------------- -->
            <div class="form-group">
                <label class="required" for="balance">{{ trans('cruds.fields.balance') }}</label>
                <input class="form-control data {{ $errors->has('balance') ? 'is-invalid' : '' }}" type="text" name="balance" id="balance" value="{{ old('balance', $transaction->balance) }}" required>
                @if($errors->has('balance'))
                <span class="text-danger">{{ $errors->first('balance') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-- ----------------currency---------------- -->
            <div class="form-group">
                <label class="required" for="currency">{{ trans('cruds.fields.currency') }}</label>
                <select class="form-control select {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency" id="currency" required>
                    <option value disabled {{ old('currency', $transaction->currency) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(config('constant.transaction_currency') as $key => $label)
                    <option value="{{ $key }}" {{ old('currency', '') === (string) $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                <span class="text-danger">{{ $errors->first('currency') }}</span>
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection