@extends('layouts.admin')
@section('content')
@can('device_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("TagManagement.Tags.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.tagManagement.sub_title_1.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tagManagement.sub_title_1.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tagManagement.sub_title_1.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tagManagement.sub_title_1.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.tagManagement.sub_title_1.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $key => $tag)
                    <tr data-entry-id="{{ $tag->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $tag->id ?? '' }}
                        </td>
                        <td>
                            {{ $tag->name ?? '' }}
                        </td>
                        <td>
                            {{ $tag->description ?? '' }}
                        </td>
                        <td>
                            @can('tag_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('TagManagement.Tags.show', $tag->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('tag_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('TagManagement.Tags.edit', $tag->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('tag_delete')
                            <form action="{{ route('TagManagement.Tags.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    'permission_massDestory'    => 'tag_delete',
    'route'                     => route('TagManagement.Tags.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-Tag'
])
@endsection