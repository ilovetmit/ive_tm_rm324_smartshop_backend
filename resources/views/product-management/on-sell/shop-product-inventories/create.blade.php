@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productManagement.shop_product_inventory.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.ShopProductInventories.store") }}" enctype="multipart/form-data">
            @csrf
            <!-- --------------------------------------shop_product_id-------------------------------------- -->
            <div class="form-group">
                <label class="required" for="shop_product_id">{{ trans('cruds.fields.shop_product_id') }}</label>
                <select class="form-control select2 {{ $errors->has('shop_product_id') ? 'is-invalid' : '' }}" name="shop_product_id" id="shop_product_id" required>
                    <option value disabled {{ old('shop_product_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
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
            <!-- --------------------------------------rfid_code-------------------------------------- -->
            <div class="form-group">
                <label class="required" for="rfid_code">{{ trans('cruds.fields.rfid_code') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="rfid_code" name="rfid_code">
                        <label class="custom-file-label" for="rfid_code">Choose file</label>
                    </div>
                </div>
            </div>
            <!-- --------------------------------------is_sold-------------------------------------- -->
            <div class="form-group">
                <label class="required" for="is_sold">{{ trans('cruds.fields.is_sold') }}</label>
                <select class="form-control select {{ $errors->has('is_sold') ? 'is-invalid' : '' }}" name="is_sold" id="is_sold" required>
                    <option value disabled {{ old('is_sold', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(config('constant.shopProductInventories_isSold_form') as $key => $label)
                    <option value="{{ $key }}" {{ old('is_sold', '') === (string) $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('is_sold'))
                <span class="text-danger">{{ $errors->first('is_sold') }}</span>
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