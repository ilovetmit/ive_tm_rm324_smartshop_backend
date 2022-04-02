@can($permission_subject.'_view')
<a class="btn btn-xs btn-primary" href="{{ route($route_subject.'.show', $id) }}">
    {{ trans('global.view') }}
</a>
@endcan

@can($permission_subject.'_edit')
<a class="btn btn-xs btn-info" href="{{ route($route_subject.'.edit', $id) }}">
    {{ trans('global.edit') }}
</a>
@endcan

@can($permission_subject.'_delete')
<form action="{{ route($route_subject.'.destroy', $id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
</form>
@endcan