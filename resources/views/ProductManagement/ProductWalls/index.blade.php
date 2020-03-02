@extends('layouts.admin')
@section('content')
@can('product_wall_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("ProductManagement.ProductWalls.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.productManagement.sub_title_7.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productManagement.sub_title_7.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_7.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_7.fields.qrcode') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_7.fields.product_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_7.fields.message') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productWalls as $key => $productWall)
                    <tr data-entry-id="{{ $productWall->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $productWall->id ?? '' }}
                        </td>
                        <td>
                            {{ $productWall->qrcode ?? '' }}
                        </td>
                        <td>
                            {{ $productWall->product_id ?? '' }}
                        </td>
                        <td>
                            {{ $productWall->message ?? '' }}
                        </td>
                        <td>
                            @can('product_wall_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('ProductManagement.ProductWalls.show', $productWall->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('product_wall_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('ProductManagement.ProductWalls.edit', $productWall->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('product_wall_delete')
                            <form action="{{ route('ProductManagement.ProductWalls.destroy', $productWall->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        @can('product_wall_delete')
        let deleteButtonTrans = "{{ trans('global.datatables.delete') }}"
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('ProductManagement.ProductWalls.massDestroy') }}",
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