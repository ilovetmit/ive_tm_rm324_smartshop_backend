@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productManagement.sub_title_3.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.VendingProducts.store") }}" enctype="multipart/form-data">
            @csrf
            <!-- --------------------------------------product_id-------------------------------------- -->
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.fields.product_id') }}</label>
                <select class="form-control select {{ $errors->has('product_id') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    <option value disabled {{ old('product_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($products as $key => $product)
                    <option value="{{ $product->id }}" {{ old('product_id', '') === (string) $key ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('product_id'))
                <span class="text-danger">{{ $errors->first('product_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------channel--------------------------->
            <div class="form-group">
                <label class="required" for="channel">{{ trans('cruds.fields.channel') }}</label>
                <input class="form-control {{ $errors->has('channel') ? 'is-invalid' : '' }}" type="text" name="channel" id="channel" value="{{ old('channel', '') }}" required>
                @if($errors->has('channel'))
                <span class="text-danger">{{ $errors->first('channel') }}</span>
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