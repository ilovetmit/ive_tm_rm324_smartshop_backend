@extends('_layout.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.informationManagement.vitcoin.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="25">
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.address') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vitcoins as $key => $vitcoin)
                    <tr data-entry-id="{{ $vitcoin->id }}">
                        <th>
                            {{ $vitcoin->id }}
                        </th>
                        <td>
                            {{ $vitcoin->hasUser->full_name ?? '' }}
                        </td>
                        <td>
                            {{ $vitcoin->address ?? '' }}
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
