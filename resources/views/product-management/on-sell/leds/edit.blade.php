@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productManagement.sub_title_5.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.LEDs.update", [$led->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-------------------------------------shop_product_id------------------------------------->
            <div class="form-group">
                <label class="required" for="shop_product_id">{{ trans('cruds.fields.shop_product_id') }}</label>
                <select class="form-control select2 {{ $errors->has('shop_product_id') ? 'is-invalid' : '' }}" name="shop_product_id" id="shop_product_id" required>
                    <option value disabled {{ old('shop_product_id', $led->shop_product_id) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($shopProducts as $key => $shopProduct)
                    <option value="{{ $shopProduct->id }}" {{ old('shop_product_id', '') === (string) $key ? 'selected' : '' }}>
                        {{ $shopProduct->hasProduct->name }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('shop_product_id'))
                <span class="text-danger">{{ $errors->first('shop_product_id') }}</span>
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