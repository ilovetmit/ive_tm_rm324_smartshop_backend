@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.lockerManagement.locker.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("LockerManagement.Lockers.store") }}" enctype="multipart/form-data">
            @csrf
            <!-- --------------------------------------qrcode-------------------------------------- -->
            <div class="form-group">
                <label class="required" for="qrcode">{{ trans('cruds.fields.qrcode') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="qrcode" name="qrcode">
                        <label class="custom-file-label" for="qrcode">Choose file</label>
                    </div>
                </div>
            </div>
            <!---------------------------per_hour_price--------------------------->
            <div class="form-group">
                <label class="required" for="per_hour_price">{{ trans('cruds.fields.per_hour_price') }}</label>
                <input class="form-control {{ $errors->has('per_hour_price') ? 'is-invalid' : '' }}" type="text" name="per_hour_price" id="per_hour_price" value="{{ old('per_hour_price', '') }}" required>
                @if($errors->has('per_hour_price'))
                <span class="text-danger">{{ $errors->first('per_hour_price') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- --------------------------------------is_active-------------------------------------- -->
            <div class="form-group">
                <label class="required" for="is_active">{{ trans('cruds.fields.is_active') }}</label>
                <select class="form-control select {{ $errors->has('is_active') ? 'is-invalid' : '' }}" name="is_active" id="is_active" required>
                    <option value disabled {{ old('is_active', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(config('constant.locker_isActive_form') as $key => $label)
                    <option value="{{ $key }}" {{ old('is_active', '') === (string) $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('is_active'))
                <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- --------------------------------------is_using-------------------------------------- -->
            <div class="form-group">
                <label class="required" for="is_using">{{ trans('cruds.fields.is_using') }}</label>
                <select class="form-control select {{ $errors->has('is_using') ? 'is-invalid' : '' }}" name="is_using" id="is_using" required>
                    <option value disabled {{ old('is_using', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(config('constant.locker_isUsing_form') as $key => $label)
                    <option value="{{ $key }}" {{ old('is_using', '') === (string) $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('is_using'))
                <span class="text-danger">{{ $errors->first('is_using') }}</span>
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