
$("document").ready(function () {
    
      $("#example").DataTable({
        "searching": true,
        "scrollX":true,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 20, 50, 'All'],
        ],
        dom: '<"top"fl<"clear">>t<"bottom"ip<"clear">>',
      });
      
      var table = $('#example').DataTable();
      minDate = new DateTime($('#min'), {
          format: 'YYYY-MM-DD'
      });
      maxDate = new DateTime($('#max'), {
          format: 'YYYY-MM-DD'
      });
      
      $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var selectedItem = $('#courseFilter').val()
          var category = data[1];
          if (selectedItem === "" || category.includes(selectedItem)) {
            return true;
          }
          return false;
        }
      );
      $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var selectedItem = $('#statusFilter').val()
          var category = data[4];
          if (selectedItem === "" || category.includes(selectedItem)) {
            return true;
          }
          return false;
        }
      );
      $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[13] );
        var date2 = new Date( data[14] );
        if (
            ( min === null && max === null ) ||
            ( min === null && date2 <= max ) ||
            ( min <= date  && max === null ) ||
            ( min <= date  && date2 <= max )
        ) {
            return true;
        }
        return false;
    }
);
 
    // Refilter the table
    $('#min, #max').on('change', function (e) {
        table.draw();
    });
   
      $('#courseFilter').on('change', function (e) {
        table.draw();
        
      });
      $("#statusFilter").change(function (e) {
        table.draw();
      });
    // DataTables initialisation
     $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });

    
});
