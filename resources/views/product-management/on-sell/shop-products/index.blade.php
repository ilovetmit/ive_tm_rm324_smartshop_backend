@extends('layouts.admin')
@section('content')
@can('shop_product_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("ProductManagement.ShopProducts.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.productManagement.sub_title_4.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productManagement.sub_title_4.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_4.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_4.fields.product_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_4.fields.qrcode') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shopProducts as $key => $shopProduct)
                    <tr data-entry-id="{{ $shopProduct->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $shopProduct->id ?? '' }}
                        </td>
                        <td>
                            {{ $shopProduct->product_id ?? '' }}
                        </td>
                        <td>
                            {{ $shopProduct->qrcode ?? '' }}
                        </td>
                        <td>
                            @can('shop_product_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('ProductManagement.ShopProducts.show', $shopProduct->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('shop_product_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('ProductManagement.ShopProducts.edit', $shopProduct->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('shop_product_delete')
                            <form action="{{ route('ProductManagement.ShopProducts.destroy', $shopProduct->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        @can('shop_product_delete')
        let deleteButtonTrans = "{{ trans('global.datatables.delete') }}"
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('ProductManagement.ShopProducts.massDestroy') }}",
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