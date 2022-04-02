@extends('_layout.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productManagement.vending_product.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.VendingProducts.update", [$vendingProduct->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-- --------------------------------------product_id-------------------------------------- -->
            <div class="form-group">
                <label class="" for="product_id">{{ trans('cruds.fields.product_id') }}</label>
                <select class="form-control select2 {{ $errors->has('product_id') ? 'is-invalid' : '' }}"
                    name="product_id" id="product_id" >
                    <option value disabled
                        {{ old('product_id', $vendingProduct->product_id) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
                    @foreach($products as $key => $product)
                    <option value="{{ $product->id }}" {{ old('product_id',$vendingProduct->product_id) === $key ? 'selected' : '' }}>
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
                <label class="" for="channel">{{ trans('cruds.fields.channel') }}</label>
                <select class="form-control select {{ $errors->has('channel') ? 'is-invalid' : '' }}" name="channel"
                    id="channel" >
                    <option value disabled {{ old('channel', $product->channel) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
                    @foreach(config('constant.vending_channel') as $key => $label)
                    <option value="{{ $key }}" {{ old('channel',$product->channel) === $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
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
