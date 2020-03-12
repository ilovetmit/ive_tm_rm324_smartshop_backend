@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.advertisementManagement.sub_title_1.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("AdvertisementManagement.ad.store") }}" enctype="multipart/form-data">
            @csrf
            <!-- ------------------------------------header------------------------------------ -->
            <div class="form-group">
                <label class="required" for="header">{{ trans('cruds.fields.header') }}</label>
                <input class="form-control {{ $errors->has('header') ? 'is-invalid' : '' }}" type="text" name="header" id="header" value="{{ old('header', '') }}" required>
                @if($errors->has('header'))
                    <span class="text-danger">{{ $errors->first('header') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-- ------------------------------------image------------------------------------ -->
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.fields.image') }}</label>
                <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text" name="image" id="image" value="{{ old('image', '') }}" required>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-- ------------------------------------description------------------------------------ -->
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
           <!-- ------------------------------------status------------------------------------ -->
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}" required>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-- ------------------------------------------------------------------------ -->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
