@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.informationManagement.address.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("InformationManagement.Addresses.store") }}" enctype="multipart/form-data">
            @csrf
            <!-- --------------------------------------user_id-------------------------------------- -->
            <div class="form-group">
                <label class="" for="user_id">{{ trans('cruds.fields.user_id') }}</label>
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id"
                    id="user_id" >
                    <option value disabled {{ old('user_id', null) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
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
            <!---------------------------addressLine1--------------------------->
            <div class="form-group">
                <label class="" for="addressLine1">{{ trans('cruds.fields.addressLine1') }}</label>
                <input class="form-control {{ $errors->has('addressLine1') ? 'is-invalid' : '' }}" type="text"
                    name="addressLine1" id="addressLine1" value="{{ old('addressLine1', '') }}" >
                @if($errors->has('addressLine1'))
                <span class="text-danger">{{ $errors->first('addressLine1') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------addressLine2--------------------------->
            <div class="form-group">
                <label class="" for="addressLine2">{{ trans('cruds.fields.addressLine2') }}</label>
                <input class="form-control {{ $errors->has('addressLine2') ? 'is-invalid' : '' }}" type="text"
                    name="addressLine2" id="addressLine2" value="{{ old('addressLine2', '') }}" >
                @if($errors->has('addressLine2'))
                <span class="text-danger">{{ $errors->first('addressLine2') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------district--------------------------->
            <div class="form-group">
                <label class="" for="district">{{ trans('cruds.fields.district') }}</label>
                <select class="form-control select2 {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district"
                    id="district" >
                    <option value disabled {{ old('district', null) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
                    @foreach(config('constant.address_district') as $key => $label)
                    <option value="{{ $key }}" {{ old('district', '') === (string) $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('district'))
                <span class="text-danger">{{ $errors->first('district') }}</span>
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
