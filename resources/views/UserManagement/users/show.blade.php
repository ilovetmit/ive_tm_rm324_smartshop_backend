@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userManagement.sub_title_3.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('UserManagement.Users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <!------------------------ID------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <!------------------------Name------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.name') }}
                        </th>
                        <td>
                            {{ $user->first_name }} {{ $user->last_name }}
                        </td>
                    </tr>
                    <!------------------------email------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <!------------------------avatar------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.avatar') }}
                        </th>
                        <td>
                            {{ $user->avatar }}
                        </td>
                    </tr>
                    <!------------------------birthday------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.birthday') }}
                        </th>
                        <td>
                            {{ $user->birthday }}
                        </td>
                    </tr>
                    <!------------------------gender------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.gender') }}
                        </th>
                        <td>
                            {{ $user->gender }}
                        </td>
                    </tr>
                    <!------------------------telephone------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.telephone') }}
                        </th>
                        <td>
                            {{ $user->telephone }}
                        </td>
                    </tr>
                    <!------------------------bio------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.bio') }}
                        </th>
                        <td>
                            {{ $user->bio }}
                        </td>
                    </tr>
                    <!------------------------status------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.status') }}
                        </th>
                        <td>
                            {{ $user->status }}
                        </td>
                    </tr>
                    <!------------------------email verified at------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <!------------------------role------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.role') }}
                        </th>
                        <td>
                            @foreach($user->hasRole as $key => $roles)
                            <span class="label label-info">{{ $roles->name }}</span>
                            @endforeach
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('UserManagement.Users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection