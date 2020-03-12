@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.smartBankManagement.sub_title_2.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("SmartBankManagement.Stocks.update", [$stock->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!---------------------------code--------------------------->
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $stock->code) }}" required>
                @if($errors->has('code'))
                <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------icon--------------------------->
            <div class="form-group">
                <label class="required" for="icon">{{ trans('cruds.fields.icon') }}</label>
                <input class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}" type="text" name="icon" id="icon" value="{{ old('icon', $stock->icon) }}" required>
                @if($errors->has('icon'))
                <span class="text-danger">{{ $errors->first('icon') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------name--------------------------->
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $stock->name) }}" required>
                @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------data--------------------------->
            <div class="form-group">
                <label class="required" for="data">{{ trans('cruds.fields.data') }}</label>
                <input class="form-control {{ $errors->has('data') ? 'is-invalid' : '' }}" type="text" name="data" id="data" value="{{ old('data', $stock->data) }}" required>
                @if($errors->has('data'))
                <span class="text-danger">{{ $errors->first('data') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------description--------------------------->
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $stock->description) }}" required>
                @if($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
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