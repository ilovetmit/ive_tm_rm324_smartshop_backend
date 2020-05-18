@extends('_layout.admin')
@section('content')
@can('vitcoin_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("InformationManagement.Vitcoins.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.informationManagement.vitcoin.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.informationManagement.vitcoin.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Vitcoin">
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
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vitcoins as $key => $vitcoin)
                    <tr data-entry-id="{{ $vitcoin->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $vitcoin->id ?? '' }}
                        </td>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $vitcoin->hasUser->id . ". " . $vitcoin->hasUser->getFullNameAttribute() ?? '',
                            ])
                        </td>
                        <td>
                            @include('_module.datatable.action.index',[
                            'permission_subject' => 'vitcoin',
                            'route_subject' => 'InformationManagement.Vitcoins',
                            'id' => $vitcoin->id
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
'permission_massDestory' => 'vitcoin_delete',
'route' => route('InformationManagement.Vitcoins.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Vitcoin'
])
@endsection
