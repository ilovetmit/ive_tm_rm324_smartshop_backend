@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.smartBankManagement.insurance.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("SmartBankManagement.Insurances.store") }}" enctype="multipart/form-data">
            @csrf
            <!---------------------------name--------------------------->
            <div class="form-group">
                <label class="" for="name">{{ trans('cruds.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                    id="name" value="{{ old('name', '') }}" >
                @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------priceM--------------------------->
            <div class="form-group">
                <label class="" for="priceMonthly">{{ trans('cruds.fields.price') }} (Monthly)</label>
                <input class="form-control {{ $errors->has('priceMonthly') ? 'is-invalid' : '' }}" type="text" name="priceMonthly"
                    id="priceMonthly" value="{{ old('priceMonthly', '') }}" >
                @if($errors->has('priceMonthly'))
                <span class="text-danger">{{ $errors->first('priceMonthly') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------priceQ--------------------------->
            <div class="form-group">
                <label class="" for="priceQuarterly">{{ trans('cruds.fields.price') }} (Quarterly)</label>
                <input class="form-control {{ $errors->has('priceQuarterly') ? 'is-invalid' : '' }}" type="text" name="priceQuarterly"
                    id="priceQuarterly" value="{{ old('priceQuarterly', '') }}" >
                @if($errors->has('priceQuarterly'))
                <span class="text-danger">{{ $errors->first('priceQuarterly') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!---------------------------priceY--------------------------->
            <div class="form-group">
                <label class="" for="priceYearly">{{ trans('cruds.fields.price') }} (Yearly)</label>
                <input class="form-control {{ $errors->has('priceYearly') ? 'is-invalid' : '' }}" type="text" name="priceYearly"
                    id="priceYearly" value="{{ old('priceYearly', '') }}" >
                @if($errors->has('priceYearly'))
                <span class="text-danger">{{ $errors->first('priceYearly') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- --------------------------------------image-------------------------------------- -->
            <div class="form-group">
                <label class="" for="image">{{ trans('cruds.fields.image') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>
            <!---------------------------description--------------------------->
            <div class="form-group">
                <label class="" for="description">{{ trans('cruds.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                    name="description" id="description" value="{{ old('description', '') }}" >
                @if($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
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
