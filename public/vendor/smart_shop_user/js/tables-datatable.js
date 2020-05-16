$(function () {
    var dataTable = $('#datatable1').DataTable({
          "order": [[ 0, "desc" ]],
          responsive: {
              details: false
          }
      }
    );

    $(document).on('sidebarChanged', function () {
        dataTable.columns.adjust();
        dataTable.responsive.recalc();
        dataTable.responsive.rebuild();
    });

});

