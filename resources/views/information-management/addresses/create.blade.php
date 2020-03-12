@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.informationManagement.sub_title_1.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("InformationManagement.Addresses.store") }}" enctype="multipart/form-data">
            @csrf
            <!---------------------------user_id--------------------------->
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.fields.user_id') }}</label>
                <input class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}" type="text" name="user_id" id="user_id" value="{{ old('user_id', '') }}" required>
                @if($errors->has('user_id'))
                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------district--------------------------->
            <div class="form-group">
                <label class="required" for="district">{{ trans('cruds.fields.district') }}</label>
                <input class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" id="district" value="{{ old('district', '') }}" required>
                @if($errors->has('district'))
                <span class="text-danger">{{ $errors->first('district') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------address1--------------------------->
            <div class="form-group">
                <label class="required" for="address1">{{ trans('cruds.fields.address1') }}</label>
                <input class="form-control {{ $errors->has('address1') ? 'is-invalid' : '' }}" type="text" name="address1" id="address1" value="{{ old('address1', '') }}" required>
                @if($errors->has('address1'))
                <span class="text-danger">{{ $errors->first('address1') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------address2--------------------------->
            <div class="form-group">
                <label class="required" for="address2">{{ trans('cruds.fields.address2') }}</label>
                <input class="form-control {{ $errors->has('address2') ? 'is-invalid' : '' }}" type="text" name="address2" id="address2" value="{{ old('address2', '') }}" required>
                @if($errors->has('address2'))
                <span class="text-danger">{{ $errors->first('address2') }}</span>
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