<!-- hasManyTable -->
<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#users_devices" role="tab" data-toggle="tab">
                {{ trans('cruds.informationManagement.sub_title_2.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="users_devices">
            @includeIf('user-management.users.relationships.users-devices', ['devices' => $user->hasDevice])
        </div>
    </div>
</div>
@endsection

<!-- image -->
<img src="{{ asset('storage/users/avatar/'.$user->avatar) }}" width="150px">
<!-- image_show_script -->
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection

<!-- action -->
@include('module.datatable.action.index',[
'permission_subject' => 'user',
'route_subject' => 'UserManagement.Users',
'id' => $user->id
])

<!-- edit_select_image -->
<!-------------------------------------gender------------------------------------->
<div class="form-group">
    <label class="required" for="gender">{{ trans('cruds.fields.gender') }}</label>
    <select class="form-control select {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
        <option value disabled {{ old('gender', $user->gender) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
        @foreach(config('constant.gender') as $key => $label)
        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>
            {{ $label }}
        </option>
        @endforeach
    </select>
    @if($errors->has('gender'))
    <span class="text-danger">{{ $errors->first('gender') }}</span>
    @endif
    <span class="help-block"></span>
</div>
<!-------------------------------------avatar------------------------------------->
<div class="form-group">
    <label class="required" for="avatar">{{ trans('cruds.fields.avatar') }}</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input {{ $errors->has('avatar') ? 'is-invalid' : '' }}" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar">{{ old('avatar', $user->avatar) }}</label>
        </div>
    </div>
</div>

<!-- create -->
<!-- --------------------------------------gender-------------------------------------- -->
<div class="form-group">
    <label class="required" for="gender">{{ trans('cruds.fields.gender') }}</label>
    <select class="form-control select {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
        <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
        @foreach(config('constant.gender') as $key => $label)
        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>
            {{ $label }}
        </option>
        @endforeach
    </select>
    @if($errors->has('gender'))
    <span class="text-danger">{{ $errors->first('gender') }}</span>
    @endif
    <span class="help-block"></span>
</div>
<!-- --------------------------------------avatar-------------------------------------- -->
<div class="form-group">
    <label class="required" for="avatar">{{ trans('cruds.fields.avatar') }}</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar">Choose file</label>
        </div>
    </div>
</div>

<!-- relation_selection -->
<!-- --------------------------------------roles-------------------------------------- -->
<div class="form-group">
    <label class="required" for="roles">{{ trans('cruds.fields.role') }}</label>
    <div style="padding-bottom: 4px">
        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
    </div>
    <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
        @foreach($roles as $id => $roles)
        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
        @endforeach
    </select>
    @if($errors->has('roles'))
    <span class="text-danger">{{ $errors->first('roles') }}</span>
    @endif
    <span class="help-block"></span>
</div>