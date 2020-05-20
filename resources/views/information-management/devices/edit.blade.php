@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.informationManagement.device.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("InformationManagement.Devices.update", [$device->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-------------------------------------user_id------------------------------------->
            <div class="form-group">
                <label class="" for="user_id">{{ trans('cruds.fields.user_id') }}</label>
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id"
                    id="user_id" >
                    <option value disabled {{ old('user_id', $device->user_id) === null ? 'selected' : '' }}>
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
            <!---------------------------token--------------------------->
            <div class="form-group">
                <label class="" for="token">{{ trans('cruds.fields.token') }}</label>
                <input class="form-control {{ $errors->has('token') ? 'is-invalid' : '' }}" type="text" name="token"
                    id="token" value="{{ old('token', $device->token) }}" >
                @if($errors->has('token'))
                <span class="text-danger">{{ $errors->first('token') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-------------------------------------is_active------------------------------------->
            <div class="form-group">
                <label class="" for="is_active">{{ trans('cruds.fields.is_active') }}</label>
                <select class="form-control select {{ $errors->has('is_active') ? 'is-invalid' : '' }}" name="is_active"
                    id="is_active" >
                    <option value disabled {{ old('is_active', $device->is_active) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
                    @foreach(config('constant.device_isActive') as $key => $label)
                    <option value="{{ $user->id }}" {{ old('is_active', '') === (string) $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('is_active'))
                <span class="text-danger">{{ $errors->first('is_active') }}</span>
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
