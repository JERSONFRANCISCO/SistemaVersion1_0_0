
$(document).ready(function() {
  $('#dataTable').DataTable();
});


$(document).ready(function() {
    $('#dataTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar por '+title+'"  style="    width: 100%;"/>' );
    } );

    var table = $('#dataTable').DataTable();
 
    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );