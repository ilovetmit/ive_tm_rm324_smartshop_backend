@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productManagement.product.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("ProductManagement.Products.update", [$product->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!---------------------------name--------------------------->
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                    id="name" value="{{ old('name', $product->name) }}" required>
                @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------price--------------------------->
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price"
                    id="price" value="{{ old('price', $product->price) }}" required>
                @if($errors->has('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------quantity--------------------------->
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number"
                    name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}" required>
                @if($errors->has('quantity'))
                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-------------------------------------image------------------------------------->
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.fields.image') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}"
                            id="image" name="image">
                        <label class="custom-file-label" for="image">{{ old('image', $product->image) }}</label>
                    </div>
                </div>
            </div>
            <!---------------------------description--------------------------->
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                    name="description" id="description" value="{{ old('description', $product->description) }}"
                    required>
                @if($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-------------------------------------status------------------------------------->
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.fields.status') }}</label>
                <select class="form-control select {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                    id="status" required>
                    <option value disabled {{ old('status', $product->status) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
                    @foreach(config('constant.product_status_form') as $key => $label)
                    <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-------------------------------------tags------------------------------------->
            <div class="form-group">
                <label for="tags">{{ trans('cruds.fields.tag') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all"
                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all"
                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]"
                    id="tags" multiple>
                    @foreach($tags as $id => $tags)
                    <option value="{{ $id }}"
                        {{ (in_array($id, old('tags', [])) || $product->hasTag->contains($id)) ? 'selected' : '' }}>
                        {{ $tags }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-------------------------------------category------------------------------------->
            <div class="form-group">
                <label for="categories">{{ trans('cruds.fields.category') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all"
                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all"
                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}"
                    name="categories[]" id="categories" multiple>
                    @foreach($categories as $id => $categories)
                    <option value="{{ $id }}"
                        {{ (in_array($id, old('categories', [])) || $product->hasCategory->contains($id)) ? 'selected' : '' }}>
                        {{ $categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                <span class="text-danger">{{ $errors->first('categories') }}</span>
                @endif
                <span class="help-block"> </span>
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
