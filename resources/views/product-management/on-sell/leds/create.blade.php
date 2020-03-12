@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productManagement.sub_title_5.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.LEDs.store") }}" enctype="multipart/form-data">
            @csrf
            <!---------------------------shop_product_id--------------------------->
            <div class="form-group">
                <label class="required" for="shop_product_id">{{ trans('cruds.fields.shop_product_id') }}</label>
                <input class="form-control {{ $errors->has('shop_product_id') ? 'is-invalid' : '' }}" type="text" name="shop_product_id" id="shop_product_id" value="{{ old('shop_product_id', '') }}" required>
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