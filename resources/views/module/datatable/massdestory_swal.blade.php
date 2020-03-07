<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can($permission_massDestory)
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{$route}}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        Swal.fire({
        title: "{{ trans('global.datatables.youcantdothat') }}",
        text: "{{ trans('global.datatables.zero_selected') }}",
        icon: 'error'
        })

        return
      }

      Swal.fire({
        title: "{{ trans('global.areYouSure') }}",
        text: "{{ trans('global.cantRevert') }}",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: "{{ trans('global.deleteYes') }}",
        cancelButtonText:"{{ trans('global.deleteNo') }}"
        }).then(res => {
        if (res.value) {
        $.ajax({
        headers: {'x-csrf-token': _token},
        method: 'POST',
        url: config.url,
        data: { ids: ids, _method: 'DELETE' }})
        .done(function () { location.reload() })
        }
     });

    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: {{$pageLength}},
  });
  $('.{{$class}}:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
