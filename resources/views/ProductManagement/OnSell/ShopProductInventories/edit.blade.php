@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productManagement.sub_title_6.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.ShopProductInventories.update", [$shopProductInventory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!---------------------------shop_product_id--------------------------->
            <div class="form-group">
                <label class="required" for="shop_product_id">{{ trans('cruds.productManagement.sub_title_6.fields.shop_product_id') }}</label>
                <input class="form-control {{ $errors->has('shop_product_id') ? 'is-invalid' : '' }}" type="text" name="shop_product_id" id="shop_product_id" value="{{ old('shop_product_id', $shopProductInventory->shop_product_id) }}" required>
                @if($errors->has('shop_product_id'))
                <span class="text-danger">{{ $errors->first('shop_product_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------rfid_code--------------------------->
            <div class="form-group">
                <label class="required" for="rfid_code">{{ trans('cruds.productManagement.sub_title_6.fields.rfid_code') }}</label>
                <input class="form-control {{ $errors->has('rfid_code') ? 'is-invalid' : '' }}" type="text" name="rfid_code" id="rfid_code" value="{{ old('rfid_code', $shopProductInventory->rfid_code) }}" required>
                @if($errors->has('rfid_code'))
                <span class="text-danger">{{ $errors->first('rfid_code') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------is_sold--------------------------->
            <div class="form-group">
                <label class="required" for="is_sold">{{ trans('cruds.productManagement.sub_title_6.fields.is_sold') }}</label>
                <input class="form-control {{ $errors->has('is_sold') ? 'is-invalid' : '' }}" type="text" name="is_sold" id="is_sold" value="{{ old('is_sold', $shopProductInventory->is_sold) }}" required>
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