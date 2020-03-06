@extends('layouts.admin')
@section('content')
@can('product_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("ProductManagement.Products.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.productManagement.sub_title_1.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productManagement.sub_title_1.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_1.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr data-entry-id="{{ $product->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $product->id ?? '' }}
                        </td>
                        <td>
                            {{ $product->name ?? '' }}
                        </td>
                        <td>
                            {{ $product->price ?? '' }}
                        </td>
                        <td>
                            {{ $product->quantity ?? '' }}
                        </td>
                        <td>
                            {{ $product->image ?? '' }}
                        </td>
                        <td>
                            {{ $product->description ?? '' }}
                        </td>
                        <td>
                            {{ $product->status ?? '' }}
                        </td>
                        <td>
                            @can('product_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('ProductManagement.Products.show', $product->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('product_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('ProductManagement.Products.edit', $product->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('product_delete')
                            <form action="{{ route('ProductManagement.Products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        @can('product_delete')
        let deleteButtonTrans = "{{ trans('global.datatables.delete') }}"
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('ProductManagement.Products.massDestroy') }}",
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