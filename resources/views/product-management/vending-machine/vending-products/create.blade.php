@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productManagement.sub_title_3.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.VendingMachine.VendingProducts.store") }}" enctype="multipart/form-data">
            @csrf
            <!---------------------------product_id--------------------------->
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.productManagement.sub_title_3.fields.product_id') }}</label>
                <input class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" type="text" name="product_id" id="product_id" value="{{ old('product_id', '') }}" required>
                @if($errors->has('product_id'))
                <span class="text-danger">{{ $errors->first('product_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------channel--------------------------->
            <div class="form-group">
                <label class="required" for="channel">{{ trans('cruds.productManagement.sub_title_3.fields.channel') }}</label>
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