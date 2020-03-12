@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.informationManagement.sub_title_4.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('InformationManagement.Vitcoins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <td>
                            {{ $vitcoin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.user_id') }}
                        </th>
                        <td>
                            {{ $vitcoin->user_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.address') }}
                        </th>
                        <td>
                            {{ $vitcoin->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.primary_key') }}
                        </th>
                        <td>
                            {{ $vitcoin->primary_key }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('InformationManagement.Vitcoins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#addresses_users" role="tab" data-toggle="tab">
                {{ trans('cruds.userManagement.sub_title_4.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="addresses_users">
            @includeIf('InformationManagement.Addresses.relationships.addressesUsers', ['users' => $address->user])
        </div>
    </div>
</div>

@endsection