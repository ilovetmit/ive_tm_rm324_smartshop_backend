@extends('layouts.admin')
@section('content')
@can('vitcoin_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("InformationManagement.Vitcoins.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.informationManagement.sub_title_4.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.informationManagement.sub_title_4.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Vitcoin">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_4.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_4.fields.user_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_4.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_4.fields.primary_key') }}
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
                            {{ $vitcoin->user_id ?? '' }}
                        </td>
                        <td>
                            {{ $vitcoin->address ?? '' }}
                        </td>
                        <td>
                            {{ $vitcoin->primary_key ?? '' }}
                        </td>
                        <td>
                            @can('vitcoin_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('InformationManagement.Vitcoins.show', $vitcoin->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('vitcoin_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('InformationManagement.Vitcoins.edit', $vitcoin->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('vitcoin_delete')
                            <form action="{{ route('InformationManagement.Vitcoins.destroy', $vitcoin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan

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
@include('module.datatable.massdestory',[
    'permission_massDestory'    => 'vitcoin_delete',
    'route'                     => route('InformationManagement.Vitcoins.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-Vitcoin'
])
@endsection