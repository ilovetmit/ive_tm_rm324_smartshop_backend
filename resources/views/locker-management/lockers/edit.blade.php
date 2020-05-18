@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.lockerManagement.locker.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("LockerManagement.Lockers.update", [$locker->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-------------------------------------qrcode------------------------------------->
            <div class="form-group">
                <label class="required" for="qrcode">{{ trans('cruds.fields.qrcode') }}</label>
                <input class="form-control {{ $errors->has('qrcode') ? 'is-invalid' : '' }}" type="text" name="qrcode"
                    id="qrcode" value="{{ old('qrcode', $locker->qrcode) }}" required>
                @if($errors->has('qrcode'))
                <span class="text-danger">{{ $errors->first('qrcode') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!---------------------------per_hour_price--------------------------->
            <div class="form-group">
                <label class="required" for="per_hour_price">{{ trans('cruds.fields.per_hour_price') }}</label>
                <input class="form-control {{ $errors->has('per_hour_price') ? 'is-invalid' : '' }}" type="number"
                    name="per_hour_price" id="per_hour_price"
                    value="{{ old('per_hour_price', $locker->per_hour_price) }}" required>
                @if($errors->has('per_hour_price'))
                <span class="text-danger">{{ $errors->first('per_hour_price') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-------------------------------------is_active------------------------------------->
            <div class="form-group">
                <label class="required" for="is_active">{{ trans('cruds.fields.is_active') }}</label>
                <select class="form-control select {{ $errors->has('is_active') ? 'is-invalid' : '' }}" name="is_active"
                    id="is_active" required>
                    <option value disabled {{ old('is_active', $locker->is_active) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
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
            <!-------------------------------------is_using------------------------------------->
            <div class="form-group">
                <label class="required" for="is_using">{{ trans('cruds.fields.is_using') }}</label>
                <select class="form-control select {{ $errors->has('is_using') ? 'is-invalid' : '' }}" name="is_using"
                    id="is_using" required>
                    <option value disabled {{ old('is_using', $locker->is_using) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
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
