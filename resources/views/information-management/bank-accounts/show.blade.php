@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.informationManagement.bank_account.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('InformationManagement.BankAccounts.index') }}">
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
                            {{ $bankAccount->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.user') }}
                        </th>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['name'],
                            'element' => $bankAccount->hasUser->id . ". " .
                            $bankAccount->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.current_account') }}
                        </th>
                        <td>
                            {{-- $bankAccount->current_account --}}
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['account'],
                            'element' => '$ '. $bankAccount->current_account ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.saving_account') }}
                        </th>
                        <td>
                            {{-- $bankAccount->saving_account --}}
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['account'],
                            'element' => '$ '. $bankAccount->saving_account ?? '',
                            ])
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('InformationManagement.BankAccounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
