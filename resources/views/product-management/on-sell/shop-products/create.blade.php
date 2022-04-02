@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productManagement.shop_product.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.ShopProducts.store") }}" enctype="multipart/form-data">
            @csrf
            <!-- --------------------------------------product_id-------------------------------------- -->
            <div class="form-group">
                <label class="" for="product_id">{{ trans('cruds.fields.product_id') }}</label>
                <select class="form-control select2 {{ $errors->has('product_id') ? 'is-invalid' : '' }}"
                    name="product_id" id="product_id" >
                    <option value disabled {{ old('product_id', null) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
                    @foreach($products as $key => $product)
                    <option value="{{ $product->id }}" {{ old('product_id', '') === $key ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('product_id'))
                <span class="text-danger">{{ $errors->first('product_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- --------------------------------------qrcode-------------------------------------- -->
            <div class="form-group">
                <label class="" for="qrcode">{{ trans('cruds.fields.qrcode') }}</label>
                <input class="form-control {{ $errors->has('qrcode') ? 'is-invalid' : '' }}" type="text" name="qrcode"
                    id="qrcode" value="{{ old('qrcode') }}" >
                @if($errors->has('qrcode'))
                <span class="text-danger">{{ $errors->first('qrcode') }}</span>
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
