@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productManagement.sub_title_1.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.Products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!---------------------------name--------------------------->
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.productManagement.sub_title_1.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------price--------------------------->
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.productManagement.sub_title_1.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', $product->price) }}" required>
                @if($errors->has('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------quantity--------------------------->
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.productManagement.sub_title_1.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}" required>
                @if($errors->has('quantity'))
                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------image--------------------------->
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.productManagement.sub_title_1.fields.image') }}</label>
                <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text" name="image" id="image" value="{{ old('image', $product->image) }}" required>
                @if($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------description--------------------------->
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.productManagement.sub_title_1.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $product->description) }}" required>
                @if($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------status--------------------------->
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.productManagement.sub_title_1.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $product->status) }}" required>
                @if($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
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