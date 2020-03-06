<div class="m-3">
    @can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("UserManagement.Users.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.advertisementManagement.sub_title_1.title') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.advertisementManagement.sub_title_1.title') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.advertisementManagement.sub_title_1.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.advertisementManagement.sub_title_1.fields.header') }}
                            </th>
                            <th>
                                {{ trans('cruds.advertisementManagement.sub_title_1.fields.image') }}
                            </th>
                            <th>
                                {{ trans('cruds.advertisementManagement.sub_title_1.fields.description') }}
                            </th>
                            <th>
                                {{ trans('cruds.advertisementManagement.sub_title_1.fields.status') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($advertisement as $key => $advertisement)
                        <tr data-entry-id="{{ $advertisement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $advertisement->id ?? '' }}
                            </td>
                            <td>
                                {{ $advertisement->header ?? '' }}
                            </td>
                            <td>
                                {{ $advertisement->image ?? '' }}
                            </td>
                            <td>
                                {{ $advertisement->description ?? '' }}
                            </td>
                            <td>
                                {{ $advertisement->status ?? '' }}
                            </td>
                            <td>
                                @can('advertisement_view')
                                <a class="btn btn-xs btn-primary" href="{{ route('AdvertisementManagement.Advertisements.show', $advertisement->id ?? '' ) }}">
                                    {{ trans('global.view') }}
                                </a>
                                @endcan

                                @can('advertisement_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('AdvertisementManagement.Advertisements.edit', $advertisement->id ?? '' ) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endcan

                                @can('advertisement_delete')
                                <form action="{{ route('AdvertisementManagement.Advertisements.destroy', $advertisement->id ?? '' ) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('product_delete')
        let deleteButtonTrans = "{{ trans('global.datatables.delete') }}"
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('AdvertisementManagement.Advertisements.massDestroy') }}",
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
        $('.datatable-User:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection