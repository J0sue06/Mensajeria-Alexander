
<!-- jQuery 3 -->
<script src=" <?php echo base_url('recursos/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('recursos/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('recursos/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('recursos/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('recursos/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('recursos/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('recursos/dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('recursos/dist/js/demo.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<script src="<?php echo base_url('js/ficha1.js');?>"></script>
<script src="<?php echo base_url('js/empleados1.js');?>"></script>


<script src="<?php echo base_url('Recursos/datatables-export/js/dataTables.buttons.min.js');?>"></script>
<script src="<?php echo base_url('Recursos/datatables-export/js/buttons.flash.min.js');?>"></script>
<script src="<?php echo base_url('Recursos/datatables-export/js/jszip.min.js');?>"></script>
<script src="<?php echo base_url('Recursos/datatables-export/js/pdfmake.min.js');?>"></script>
<script src="<?php echo base_url('Recursos/datatables-export/js/vfs_fonts.js');?>"></script>
<script src="<?php echo base_url('Recursos/datatables-export/js/buttons.html5.min.js');?>"></script>
<script src="<?php echo base_url('Recursos/datatables-export/js/buttons.print.min.js');?>"></script>



<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          //Boton para reportes en formato Excel
          {
            extend: 'excelHtml5',
            title: "Reporte de Fichas",
            exportOptions:{
              columns: [1,2,3,4]
                         }
          },

          //Boton para reportes en formato PDF
          {
            extend: 'pdfHtml5',
            title: "Listado de Fichas",
            exportOptions:{
              columns: [1,2,3,4]
                          }
          },          
            
        ],

        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "No hay informacion en la base de datos para mostrar!",
            "info": "Mostrando _PAGE_ Pagina de un Total de _PAGES_ Pagina/s",
            "infoEmpty": "No hay registros!",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search":         "Buscar en la tabla:",
            "paginate": {
        "first":      "First",
        "last":       "Last",
        "next":       "Proximo",
        "previous":   "Anterior"
    }
        }

    } );
} );
</script>

</body>
</html>
