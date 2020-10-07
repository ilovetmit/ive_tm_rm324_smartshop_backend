@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userManagement.user.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("UserManagement.Users.update", [$user->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-------------------------------------Name------------------------------------->
            <div class="form-group row">
                <div class="col-5">
                    <label class="" for="first_name">{{ trans('cruds.fields.first_name') }}</label>
                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text"
                        name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" >
                    @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif
                    <span class="help-block"> </span>
                </div>
                <div class="col-7">
                    <label class="" for="last_name">{{ trans('cruds.fields.last_name') }}</label>
                    <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text"
                        name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" >
                    @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                    <span class="help-block"> </span>
                </div>
            </div>
            <!-------------------------------------email------------------------------------->
            <div class="form-group">
                <label class="" for="email">{{ trans('cruds.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email"
                    id="email" value="{{ old('email', $user->email) }}" >
                @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-------------------------------------password------------------------------------->
            <div class="form-group">
                <label class="" for="password">{{ trans('cruds.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                    name="password" id="password">
                @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-------------------------------------avatar------------------------------------->
            <div class="form-group">
                <label class="" for="avatar">{{ trans('cruds.fields.avatar') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input {{ $errors->has('avatar') ? 'is-invalid' : '' }}"
                            id="avatar" name="avatar" value="{{ old('avatar', $user->avatar) }}">
                        <label class="custom-file-label" for="avatar">{{ old('avatar', $user->avatar) }}</label>
                    </div>
                </div>
            </div>
            <!-------------------------------------birthday------------------------------------->
            <div class="form-group">
                <label class="" for="birthday">{{ trans('cruds.fields.birthday') }}</label>
                <input class="form-control data {{ $errors->has('birthday') ? 'is-invalid' : '' }}" type="text"
                    name="birthday" id="birthday" value="{{ old('birthday', $user->birthday) }}" >
                @if($errors->has('birthday'))
                <span class="text-danger">{{ $errors->first('birthday') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-------------------------------------gender------------------------------------->
            <div class="form-group">
                <label class="" for="gender">{{ trans('cruds.fields.gender') }}</label>
                <select class="form-control select {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender"
                    id="gender" >
                    <option value disabled {{ old('gender', $user->gender) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
                    @foreach(config('constant.gender') as $key => $label)
                    <option value="{{ $key }}" {{ old('gender') === $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-------------------------------------telephone------------------------------------->
            <div class="form-group">
                <label class="" for="telephone">{{ trans('cruds.fields.telephone') }}</label>
                <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text"
                    name="telephone" id="telephone" value="{{ old('telephone', $user->telephone) }}" >
                @if($errors->has('telephone'))
                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-------------------------------------bio------------------------------------->
            <div class="form-group">
                <label class="" for="bio">{{ trans('cruds.fields.bio') }}</label>
                <input class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}" type="text" name="bio"
                    id="bio" value="{{ old('bio', $user->bio) }}" >
                @if($errors->has('bio'))
                <span class="text-danger">{{ $errors->first('bio') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-------------------------------------status------------------------------------->
            <div class="form-group">
                <label class="" for="status">{{ trans('cruds.fields.status') }}</label>
                <select class="form-control select {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                    id="status" >
                    <option value disabled {{ old('status', $user->status) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
                    @foreach(config('constant.user_status') as $key => $label)
                    <option value="{{ $key }}" {{ old('status',$user->status) === $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-------------------------------------role------------------------------------->
            <div class="form-group">
                <label class="" for="roles">{{ trans('cruds.fields.role') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all"
                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all"
                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]"
                    id="roles" multiple >
                    @foreach($roles as $id => $roles)
                    <option value="{{ $id }}"
                        {{ (in_array($id, old('roles', [])) || $user->hasRole->contains($id)) ? 'selected' : '' }}>
                        {{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-------------------------------------------------------------------------->
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
