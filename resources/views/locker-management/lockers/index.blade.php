@extends('layouts.admin')
@section('content')
@can('locker_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("LockerManagement.Lockers.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.lockerManagement.sub_title_1.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.lockerManagement.sub_title_1.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.lockerManagement.sub_title_1.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.lockerManagement.sub_title_1.fields.qrcode') }}
                        </th>
                        <th>
                            {{ trans('cruds.lockerManagement.sub_title_1.fields.per_hour_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.lockerManagement.sub_title_1.fields.is_active') }}
                        </th>
                        <th>
                            {{ trans('cruds.lockerManagement.sub_title_1.fields.is_using') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lockers as $key => $locker)
                    <tr data-entry-id="{{ $locker->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $locker->id ?? '' }}
                        </td>
                        <td>
                            {{ $locker->qrcode ?? '' }}
                        </td>
                        <td>
                            {{ $locker->per_hour_price ?? '' }}
                        </td>
                        <td>
                            {{ $locker->is_active ?? '' }}
                        </td>
                        <td>
                            {{ $locker->is_using ?? '' }}
                        </td>
                        <td>
                            @can('locker_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('LockerManagement.Lockers.show', $locker->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('locker_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('LockerManagement.Lockers.edit', $locker->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('locker_delete')
                            <form action="{{ route('LockerManagement.Lockers.destroy', $locker->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
<script>
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('locker_delete')
        let deleteButtonTrans = "{{ trans('global.datatables.delete') }}"
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('LockerManagement.Lockers.massDestroy') }}",
            className: 'btn-danger',
            action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function(entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert("{{ trans('global.datatables.zero_selected') }}")

                    return
                }

                if (confirm("{{ trans('global.areYouSure') }}")) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': _token
                            },
                            method: 'POST',
                            url: config.url,
                            data: {
                                ids: ids,
                                _method: 'DELETE'
                            }
                        })
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        dtButtons.push(deleteButton)
        @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            order: [
                [1, 'desc']
            ],
            pageLength: 100,
        });
        $('.datatable-Permission:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection