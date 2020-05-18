@extends('_layout.admin')
@section('content')
@can('bank_account_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("InformationManagement.BankAccounts.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.informationManagement.bank_account.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.informationManagement.bank_account.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Bank-Account">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.current_account') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.saving_account') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bankAccounts as $key => $bankAccount)
                    <tr data-entry-id="{{ $bankAccount->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $bankAccount->id ?? '' }}
                        </td>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $bankAccount->hasUser->id . ". " .
                            $bankAccount->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => '$ '. $bankAccount->current_account ?? '',
                            ])
                        </td>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => '$ '. $bankAccount->saving_account ?? '',
                            ])
                        </td>
                        <td>
                            @include('_module.datatable.action.index',[
                            'permission_subject' => 'bank_account',
                            'route_subject' => 'InformationManagement.BankAccounts',
                            'id' => $bankAccount->id
                            ])
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@include('_module.datatable.massdestory',[
'permission_massDestory' => 'bank_account_delete',
'route' => route('InformationManagement.BankAccounts.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Bank-Account'
])
@endsection
