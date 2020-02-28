@extends('layouts.admin')
@section('content')
@can('address_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("InformationManagement.Addresses.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.informationManagement.sub_title_1.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.informationManagement.sub_title_1.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_1.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_1.fields.user_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.informationManagement.sub_title_1.fields.district') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addresses as $key => $address)
                    <tr data-entry-id="{{ $address->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $address->id ?? '' }}
                        </td>
                        <td>
                            {{ $address->user->first_name ?? '' }} {{ $address->user->last_name ?? '' }}
                        </td>
                        <td>
                            {{ $address->district ?? '' }}
                        </td>
                        <td>
                            @can('address_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('InformationManagement.Addresses.show', $address->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('address_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('InformationManagement.Addresses.edit', $address->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('address_delete')
                            <form action="{{ route('InformationManagement.Addresses.destroy', $address->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        @can('address_delete')
        let deleteButtonTrans = "{{ trans('global.datatables.delete') }}"
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('InformationManagement.Addresses.massDestroy') }}",
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