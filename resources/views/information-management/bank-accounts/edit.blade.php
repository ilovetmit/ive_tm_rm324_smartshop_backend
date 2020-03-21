@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.informationManagement.bank_account.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("InformationManagement.BankAccounts.update", [$bankAccount->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!---------------------------user_id--------------------------->
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.fields.user_id') }}</label>
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    <option value disabled {{ old('user_id', $bankAccount->user_id) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
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
            <!---------------------------current_account--------------------------->
            <div class="form-group">
                <label class="required" for="current_account">{{ trans('cruds.fields.current_account') }}</label>
                <input class="form-control {{ $errors->has('current_account') ? 'is-invalid' : '' }}" type="number" name="current_account" id="current_account" value="{{ old('current_account', $bankAccount->current_account) }}" required>
                @if($errors->has('current_account'))
                <span class="text-danger">{{ $errors->first('current_account') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------saving_account--------------------------->
            <div class="form-group">
                <label class="required" for="saving_account">{{ trans('cruds.fields.saving_account') }}</label>
                <input class="form-control {{ $errors->has('saving_account') ? 'is-invalid' : '' }}" type="number" name="saving_account" id="saving_account" value="{{ old('saving_account', $bankAccount->saving_account) }}" required>
                @if($errors->has('saving_account'))
                <span class="text-danger">{{ $errors->first('saving_account') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!------------------------------------------------------>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection