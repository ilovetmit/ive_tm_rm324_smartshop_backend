@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productManagement.sub_title_4.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.ShopProducts.update", [$shopProduct->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!---------------------------product_id--------------------------->
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.fields.product_id') }}</label>
                <input class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" type="text" name="product_id" id="product_id" value="{{ old('product_id', $shopProduct->product_id) }}" required>
                @if($errors->has('product_id'))
                <span class="text-danger">{{ $errors->first('product_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-------------------------------------qrcode------------------------------------->
            <div class="form-group">
                <label class="required" for="qrcode">{{ trans('cruds.fields.qrcode') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input {{ $errors->has('qrcode') ? 'is-invalid' : '' }}" id="qrcode" name="qrcode">
                        <label class="custom-file-label" for="qrcode">{{ old('qrcode', $shopProduct->qrcode) }}</label>
                    </div>
                </div>
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