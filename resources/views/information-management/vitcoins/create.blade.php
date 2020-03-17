@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.informationManagement.sub_title_4.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("InformationManagement.Vitcoins.store") }}" enctype="multipart/form-data">
            @csrf
            <!-- --------------------------------------user_id-------------------------------------- -->
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.fields.user_id') }}</label>
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    <option value disabled {{ old('user_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
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
            <!---------------------------address--------------------------->
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                @if($errors->has('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------primary_key--------------------------->
            <div class="form-group">
                <label class="required" for="primary_key">{{ trans('cruds.fields.primary_key') }}</label>
                <input class="form-control {{ $errors->has('primary_key') ? 'is-invalid' : '' }}" type="text" name="primary_key" id="primary_key" value="{{ old('primary_key', '') }}" required>
                @if($errors->has('primary_key'))
                <span class="text-danger">{{ $errors->first('primary_key') }}</span>
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