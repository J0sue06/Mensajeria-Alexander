 <!-- Default box -->
 <div class="box">
     <div class="box-header with-border">
       <h3 class="box-title">Editar Empleados</h3>

       <div class="box-tools pull-right">
         <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                 title="Collapse">
           <i class="fa fa-minus"></i></button>
         <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
           <i class="fa fa-times"></i></button>
       </div>
     </div>
     <div class="box-body">

    
     <!--Formulario de Editar -->

     <!-- Mediante un Id que se le pasa al metodo este imprime los datos relacionados con esa persona y lo muestra en cada campo respectivamente-->
<form id="EditarEmpleado" method="post" action="<?php echo base_url();?>EmpleadosController/Actualizar" >

<div class="form-group" id="Iddiv" hidden>
    <label >ID </label>
    <input id="Id" name="Id" type="text" class="form-control" value="<?php echo $row->id_empleado ?>" >
    <div class="invalid-feedback">
    </div>    
  </div>
  
  <div class="form-group" id="nombrediv">
    <label >Nombre </label>
    <input disabled id="Nombre" name="Nombre" type="text" class="form-control" value="<?php echo $row->nombre ?>" >
    <div class="invalid-feedback">
    </div>    
  </div>
  <div class="form-group" id="apellidodiv">
    <label >Apellido</label>
    <input disabled name="Apellido" type="text" class="form-control" value="<?php echo $row->apellido ?>"  >
    <div class="invalid-feedback">
    </div>  
  </div>
  <div class="form-group" id="ceduladiv">
    <label >Cedula</label>
    <input disabled name="Cedula" type="text" class="form-control" value="<?php echo $row->cedula ?>"  >
    <div class="invalid-feedback">
    </div> 
  </div>  
  <div class="form-group" id="telefonodiv">
    <label >Telefono</label>
    <input disabled name="Telefono" type="text" class="form-control" value="<?php echo $row->telefono ?>" >
    <div class="invalid-feedback">
    </div> 
  </div>
  <div class="form-group" id="correodiv">
    <label >Correo</label>
    <input disabled name="Correo" type="text" class="form-control" value="<?php echo $row->correo ?>"  >
    <div class="invalid-feedback">
    </div> 
  </div>
  <div class="form-group" id="clavediv">
    <label >Clave</label>
    <input disabled name="Clave" type="text" class="form-control" value="<?php echo $row->clave ?>" >
    <div class="invalid-feedback">
    </div> 
  </div>

  <div class="form-group" id="accesodiv">
    <label >Nivel de Acceso</label>
    <input name="Acceso" type="text" class="form-control" value="<?php echo $row->acceso ?>" >
    <div class="invalid-feedback">
    </div> 
  </div>

  <div class="form-group">
<label>Nota:</label> 
  <p>Un empleado con acceso [ <code>0</code> ] solo podra acceder a fichas con este acceso.</p>
  <p>Un empleado con acceso [ <code>1</code> ] solo podra acceder a fichas con este acceso.</p>
</div>
  <br>

  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
  <button id="volver" class="btn btn-warning">Volver Atras</button>

</form>

</div>
      <!-- /.box -->

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  


  