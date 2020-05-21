@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.smartBankManagement.insurance.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("SmartBankManagement.Insurances.update", [$insurance->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!---------------------------name--------------------------->
            <div class="form-group">
                <label class="" for="name">{{ trans('cruds.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                    id="name" value="{{ old('name', $insurance->name) }}" >
                @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------price--------------------------->
            <div class="form-group">
                <label class="" for="price">{{ trans('cruds.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price"
                    id="price" value="{{ old('price', $insurance->price) }}" >
                @if($errors->has('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-------------------------------------image------------------------------------->
            <div class="form-group">
                <label class="" for="image">{{ trans('cruds.fields.image') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}"
                            id="image" name="image">
                        <label class="custom-file-label" for="image">{{ old('image', $insurance->image) }}</label>
                    </div>
                </div>
            </div>
            <!---------------------------description--------------------------->
            <div class="form-group">
                <label class="" for="description">{{ trans('cruds.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                    name="description" id="description" value="{{ old('description', $insurance->description) }}"
                    >
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection
