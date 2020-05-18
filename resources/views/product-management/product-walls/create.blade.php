@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productManagement.product_wall.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.ProductWalls.store") }}" enctype="multipart/form-data">
            @csrf
            <!-- --------------------------------------qrcode-------------------------------------- -->
            <div class="form-group">
                <label class="required" for="qrcode">{{ trans('cruds.fields.qrcode') }}</label>
                <input class="form-control {{ $errors->has('qrcode') ? 'is-invalid' : '' }}" type="text" name="qrcode"
                    id="qrcode" value="{{ old('qrcode') }}" required>
                @if($errors->has('qrcode'))
                <span class="text-danger">{{ $errors->first('qrcode') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- --------------------------------------product_id-------------------------------------- -->
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.fields.product_id') }}</label>
                <select class="form-control select {{ $errors->has('product_id') ? 'is-invalid' : '' }}"
                    name="product_id" id="product_id" required>
                    <option value disabled {{ old('product_id', null) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
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
            <!---------------------------message--------------------------->
            <div class="form-group">
                <label class="required" for="message">{{ trans('cruds.fields.message') }}</label>
                <input class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" type="text" name="message"
                    id="message" value="{{ old('message', '') }}" required>
                @if($errors->has('message'))
                <span class="text-danger">{{ $errors->first('message') }}</span>
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
