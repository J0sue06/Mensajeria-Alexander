

   <!-- Default box -->
   <div class="box">
     <div class="box-header with-border">
       <h3 class="box-title">Reporte de Fichas</h3> <label class="spinner-border">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Total de Fichas: " . "<code>" . count($rows). "</code>"?></label>

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
     <label>Obtener Reportes en los formatos</label>
     <table id="example" class="table table-hover table-bordered">
          <thead class="thead-dark">
    <tr>
              <th>#</th>
              <th>Fecha de creacion</th>
              <th>Creador de Ficha</th>              
              <th>Empleado Asignado</th>
              <th>Nombre del Documento</th>             
              <th>Acciones</th>           
    </tr>
         </thead>
  <tbody>

<?php 
//Se imprimen todos las fichas en la tabla mediante un foreach
$con = 1;
foreach ($rows as $row ) { 
  //Con este if se pregunta si el acceso del usuario es igual al
  //acceso de la ficha para poder mostrarle al usuario solo las
  //fichas a las cuales el tiene acceso
  if ($this->session->userdata('acceso') == $row->acceso) {
  ?>
  <tr>
 <td> <?php echo $con; ?> </td>
 <td> <?php echo $row->fecha ?> </td>
 <td> <?php echo $row->nombre." ".$row->apellido ?> </td>
 <td> <?php echo $row->asignacion ?> </td>
 <td> <?php  
  
  //Si el nombre del documento aparece vacio entonces
  //Se imprime en el campo un mensaje
  if($row->documento == '')
 {
  echo '<code>Archivo sin subir</code>';
 }else //Si el nombre del documento no es vacio pues se
       //se imprime el nombre del documento
 {
 echo $row->documento;
 }
 ?> 
 </td>
   <!-- Si el nombre del documento esta vacio se imprime un boton para subir el archivo -->
 <?php if($row->documento == '') { ?>
 <td><a href="<?php echo base_url() ?>FichaController/cargar/<?php echo $row->id_ficha ?>" class="btn btn-primary">Subir Documento</a></td>
<?php } elseif($row->documento != ''){ ?> 
  <!-- En el caso de que aparezca el nombre del archivo se muestra un boton para descargar -->
  <td><a href="<?php echo base_url() ?>FichaController/descargar/<?php echo $row->documento ?>" class="btn btn-warning">Descargar Archivo</a></td>
 
 
 <?php 
         //Fin del ElseIf secundario
         } 

         
      }      //Si el usuario es administrador tiene acceso total
      elseif($this->session->userdata('acceso') == 'administrador') { ?>
         <tr>
 <td> <?php echo $con; ?> </td>
 <td> <?php echo $row->fecha ?> </td>
 <td> <?php echo $row->nombre." ".$row->apellido ?> </td>
 <td> <?php echo $row->asignacion ?> </td>

 <td> <?php  
  
  //Si el nombre del documento aparece vacio entonces
  //Se imprime en el campo un mensaje
  if($row->documento == '')
 {
  echo '<code>Archivo sin subir</code>';
 }else //Si el nombre del documento no es vacio pues se
       //se imprime el nombre del documento
 {
 echo $row->documento;
 }
 ?> 
 </td>
 <?php if($row->documento == '') { ?>
 <td><a href="<?php echo base_url() ?>FichaController/cargar/<?php echo $row->id_ficha ?>" class="btn btn-primary">Subir Documento</a></td>
<?php } elseif($row->documento != ''){ ?> 
  <!-- En el caso de que aparezca el nombre del archivo se muestra un boton para descargar -->
  <td><a href="<?php echo base_url() ?>FichaController/descargar/<?php echo $row->documento ?>" class="btn btn-warning">Descargar Archivo</a></td>
 
    <?php }//Fin del ElseIf Secundario
          }//Fin del ElseIf Primario
        
      $con += 1; //Se le suma 1 a la variable
   
}//Fin del Foreach   
 ?> 
 </tr>
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