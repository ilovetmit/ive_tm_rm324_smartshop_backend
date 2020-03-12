@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tagManagement.sub_title_1.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("TagManagement.Tags.update", [$tag->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-- ---------------------------------name--------------------------------- -->
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $address->name) }}" required>
                @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- ---------------------------------description--------------------------------- -->
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $address->description) }}" required>
                @if($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- ---------------------------------advertisement--------------------------------- -->
            <!-- ---------------------------------product--------------------------------- -->
            <!-- ------------------------------------------------------------------ -->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection