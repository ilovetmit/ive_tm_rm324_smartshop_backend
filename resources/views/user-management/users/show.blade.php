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
                            {{ $user->getFullNameAttribute() }}
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
                            {{ $user->avatar }} ?? how to show picture ??
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
                            {{ config('constant.user_gender')[$user->gender] }}
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
                            {{ config('constant.user_status')[$user->status] }}
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
                                <h5>
                                    @include('module.datatable.badge_tag.tag',[
                                    'type' => 'info',
                                    'element' => $roles->name ?? '',
                                    ])
                                </h5>
                            @endforeach
                        </td>
                    </tr>
                    <!-- todo -->
                    <!------------------------address------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.address') }}
                        </th>
                        <td>
                            @if(!is_null($user->hasAddress))
                                {{ $user->hasAddress->getFullAddress() ?? '-' }}
                            @endif
                        </td>
                    </tr>

                    <!------------------------device------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.device') }}
                        </th>
                        <td>
                            @foreach($user->hasDevice as $key => $device)
                                <h5>
                                    @include('module.datatable.badge_tag.tag',[
                                    'type' => 'info',
                                    'element' => $device->is_active ?? '',
                                    ])
                                </h5>
                            @endforeach
                        </td>
                    </tr>
                    <!------------------------interest------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.interest') }}
                        </th>
                        <td>
                            @foreach($user->hasInterest as $key => $interests)
                                <h5>
                                    @include('module.datatable.badge_tag.tag',[
                                    'type' => 'info',
                                    'element' => $interests->name ?? '',
                                    ])
                                </h5>
                            @endforeach
                        </td>
                    </tr>
                    <!------------------------vitcoin------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.userManagement.sub_title_3.fields.vitcoin') }}
                        </th>
                        <td>
                            <h5>
                                @include('module.datatable.badge_tag.tag',[
                                'type' => 'info',
                                'element' => $vitcoins->address ?? '',
                                ])
                            </h5>
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
