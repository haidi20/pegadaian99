<script>
    $(document).ready(function() {
       $('#list_biaya_titip').DataTable( {
           responsive: {
               details: {
                   renderer: function ( api, rowIdx, columns ) {
                       var data = $.map( columns, function ( col, i ) {
                           return col.hidden ?
                               '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                   '<td>'+col.title+':'+'</td> '+
                                   '<td>'+col.data+'</td>'+
                               '</tr>' :
                               '';
                       }).join('');
   
                       return data ?
                           $('<table/>').append( data ) :
                           false;
                   }
               }
           }
       }).page( 'last' ).draw( 'page' );
   });

   $(function(){
       $('#nominal').on('keyup' ,function(){
           this.value = formatRupiah(this.value)
       });
   });
</script>