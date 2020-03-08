

   <!-- Default box -->
   <div class="box">
     <div class="box-header with-border">
       <h3 class="box-title">Lista de Empleados</h3> <label class="spinner-border">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Total de Empleados: " . "<code>" . count($rows). "</code>"?></label>

       <div class="box-tools pull-right">
         <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                 title="Collapse">
           <i class="fa fa-minus"></i></button>
         <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
           <i class="fa fa-times"></i></button>
       </div>
     </div>
     <div class="box-body">
     <div class="table-responsive">
     
     <table id="example" class="table table-hover table-bordered">
          <thead class="thead-dark">
    <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellido</th>              
              <th>Cedula</th>
              <th>Telefono</th>             
              <th>Correo</th>
              <th>Clave</th>
              <th>Acceso</th> 
              <th>Acciones</th>          
    </tr>
         </thead>
  <tbody>

<?php 
//Se imprimen los datos en la tabla mediante el Foreach
$con = 1;
foreach ($rows as $row ) { ?>
<tr>
 <td> <?php echo $con; ?> </td>
 <td> <?php echo $row->nombre ?> </td>
 <td> <?php echo $row->apellido ?> </td>
 <td> <?php echo $row->cedula ?> </td>
 <td> <?php echo $row->telefono ?> </td>
 <td> <?php echo $row->correo ?> </td>
 <td> <?php echo $row->clave?> </td>
 <td> <?php echo $row->acceso ?> </td>

 <!-- Este boton redirecciona a la vista editar y mediante el id que se le pasa el busca y muestra el usuario correspondiente-->
 <td><a href="<?php echo base_url() ?>EmpleadosController/EditarView/<?php echo $row->id_empleado ?>" class="btn btn-primary">Cambiar Acceso</a></td>

 </tr>

<?php 
$con += 1;
} 
?>

  </tbody>
  
</table>
</div>
        </div>
        <!-- /.FOOTER DE LA TABLA
        SOLO DESCOMENTAR DE ABAJO Y LISTO!!
        <div class="box-footer">
          Footer
        </div>
        -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->