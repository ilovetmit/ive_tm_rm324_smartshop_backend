@extends('layouts.admin')
@section('content')
@can('interest_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("InformationManagement.Interests.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.informationManagement.sub_title_3.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.informationManagement.sub_title_3.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Interest">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_3.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_3.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_3.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($interests as $key => $interest)
                    <tr data-entry-id="{{ $interest->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $interest->id ?? '' }}
                        </td>
                        <td>
                            {{ $interest->name ?? '' }}
                        </td>
                        <td>
                            {{ $interest->description ?? '' }}
                        </td>
                        <td>
                            @can('interest_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('InformationManagement.Interests.show', $interest->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('interest_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('InformationManagement.Interests.edit', $interest->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('interest_delete')
                            <form action="{{ route('InformationManagement.Interests.destroy', $interest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    'permission_massDestory'    => 'interest_delete',
    'route'                     => route('InformationManagement.Interests.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-Interest'
])
@endsection