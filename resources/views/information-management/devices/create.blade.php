@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.informationManagement.sub_title_2.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("InformationManagement.Devices.store") }}" enctype="multipart/form-data">
            @csrf
            <!---------------------------token--------------------------->
            <div class="form-group">
                <label class="required" for="token">{{ trans('cruds.fields.token') }}</label>
                <input class="form-control {{ $errors->has('token') ? 'is-invalid' : '' }}" type="text" name="token" id="token" value="{{ old('token', '') }}" required>
                @if($errors->has('token'))
                <span class="text-danger">{{ $errors->first('token') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------user_id--------------------------->
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.fields.user_id') }}</label>
                <input class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}" type="text" name="user_id" id="user_id" value="{{ old('user_id', '') }}" required>
                @if($errors->has('user_id'))
                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------is_active--------------------------->
            <div class="form-group">
                <label class="required" for="is_active">{{ trans('cruds.fields.is_active') }}</label>
                <input class="form-control {{ $errors->has('is_active') ? 'is-invalid' : '' }}" type="text" name="is_active" id="is_active" value="{{ old('is_active', '') }}" required>
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