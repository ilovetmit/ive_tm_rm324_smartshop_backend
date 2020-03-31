@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userManagement.user.title') }}
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
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <!------------------------Name------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.name') }}
                        </th>
                        <td>
                            {{ $user->getFullNameAttribute() }}
                        </td>
                    </tr>
                    <!------------------------email------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <!------------------------avatar------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.avatar') }}
                        </th>
                        <td>
                            <img src="{{ asset('storage/users/avatar/'.$user->avatar) }}" width="150px">
                        </td>
                    </tr>
                    <!------------------------birthday------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.birthday') }}
                        </th>
                        <td>
                            {{ $user->birthday }}
                        </td>
                    </tr>
                    <!------------------------gender------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.gender') }}
                        </th>
                        <td>
                            {{ config('constant.user_gender')[$user->gender] }}
                        </td>
                    </tr>
                    <!------------------------telephone------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.telephone') }}
                        </th>
                        <td>
                            {{ $user->telephone }}
                        </td>
                    </tr>
                    <!------------------------bio------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.bio') }}
                        </th>
                        <td>
                            {{ $user->bio }}
                        </td>
                    </tr>
                    <!------------------------status------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.status') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => $user->status == 1 ? config('constant.user_status')['tag_type_1'] : config('constant.user_status')['tag_type_2'],
                            'element' => config('constant.user_status')[$user->status] ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------email verified at------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <!------------------------role------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.role') }}
                        </th>
                        <td>
                            @foreach($user->hasRole as $key => $roles)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $roles->name ?? '',
                            ])
                            @endforeach
                        </td>
                    </tr>
                    <!------------------------address------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.address') }}
                        </th>
                        <td>
                            @if(!is_null($user->hasAddress))
                            {{ $user->hasAddress->getFullAddress() ?? '-' }}
                            @endif
                        </td>
                    </tr>
                    <!------------------------interest------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.interest') }}
                        </th>
                        <td>
                            @foreach($user->hasInterest as $key => $interests)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $interests->name ?? '',
                            ])
                            @endforeach
                        </td>
                    </tr>
                    <!------------------------vitcoin------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.vitcoin') }}
                        </th>
                        <td>
                            @if(!is_null($user->hasVitcoin))
                            {{ $user->hasVitcoin->address ?? '-' }}
                            @endif
                        </td>
                    </tr>
                    <!------------------------current_account------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.current_account') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => '$ '. $user->hasBankAccount->current_account ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------saving_account------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.saving_account') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => '$ '. $user->hasBankAccount->saving_account ?? '',
                            ])
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
<!-- hasManyTable -->
<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        @if(!is_null($user->hasDevice)>0)
        <li class="nav-item">
            <a class="nav-link" href="#devices" role="tab" data-toggle="tab">
                {{ trans('cruds.informationManagement.device.title') }}
            </a>
        </li>
        @endif
        @if(!is_null($user->hasInterest)>0)
        <li class="nav-item">
            <a class="nav-link" href="#interests" role="tab" data-toggle="tab">
                {{ trans('cruds.informationManagement.interest.title') }}
            </a>
        </li>
        @endif
        @if(!is_null($user->hasTransaction)>0)
        <li class="nav-item">
            <a class="nav-link" href="#transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transactionManagement.transaction.title') }}
            </a>
        </li>
        @endif
    </ul>
    <div class="tab-content">
        @if(!is_null($user->hasTransaction)>0)
        <div class="tab-pane" role="tabpanel" id="devices">
            @includeIf('relationships.devices', ['devices' => $user->hasDevice])
        </div>
        @endif
        @if(!is_null($user->hasInterest)>0)
        <div class="tab-pane" role="tabpanel" id="interests">
            @includeIf('relationships.interests', ['interests' => $user->hasInterest])
        </div>
        @endif
        @if(!is_null($user->hasTransaction)>0)
        <div class="tab-pane" role="tabpanel" id="transactions">
            @includeIf('relationships.transactions', ['transactions' => $user->hasTransaction])
        </div>
        @endif
    </div>
</div>
@endsection