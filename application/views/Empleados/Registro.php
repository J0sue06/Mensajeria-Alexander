 <!-- Default box -->
 <div class="box">
     <div class="box-header with-border">
       <h3 class="box-title">Registro de Empleados</h3>

       <div class="box-tools pull-right">
         <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                 title="Collapse">
           <i class="fa fa-minus"></i></button>
         <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
           <i class="fa fa-times"></i></button>
       </div>
     </div>
     <div class="box-body">


     <!--Formulario de Registro -->
<form  method="post" id="empleado">

  <div class="form-group" id="nombrediv">
    <label >Nombre </label>
    <input id="Nombre" name="Nombre" type="text" class="form-control" placeholder="El Nombre del Empleado">
    <div class="invalid-feedback">
    </div>    
  </div>
  <div class="form-group" id="apellidodiv">
    <label >Apellido</label>
    <input name="Apellido" type="text" class="form-control" placeholder="El Apellido del Empleado" >
    <div class="invalid-feedback">
    </div>  
  </div>
  <div class="form-group" id="ceduladiv">
    <label >Cedula</label>
    <input name="Cedula" type="text" class="form-control" placeholder="La Cedula del Empleado" >
    <div class="invalid-feedback">
    </div> 
  </div>  
  <div class="form-group" id="telefonodiv">
    <label >Telefono</label>
    <input name="Telefono" type="text" class="form-control" placeholder="El Telefono del Empleado" >
    <div class="invalid-feedback">
    </div> 
  </div>
  <div class="form-group" id="correodiv">
    <label >Correo</label>
    <input name="Correo" type="text" class="form-control" placeholder="El Correo del Empleado" >
    <div class="invalid-feedback">
    </div> 
  </div>
  <div class="form-group" id="clavediv">
    <label >Clave</label>
    <input name="Clave" type="text" class="form-control" placeholder="La Clave del Empleado" >
    <div class="invalid-feedback">
    </div> 
  </div>

  <div class="form-group" id="accesodiv" >  
      <label for="inputState">Nivel de Acceso</label>
      <select name="Acceso" class="form-control">
        <option selected disabled selected>Seleccionar</option>
        <option selected>administrador</option>
        <option selected>0</option>
        <option selected>1</option>
      </select>  
      <div class="invalid-feedback">
    </div>   
  </div> 

  <div class="form-group">
<label>Nota:</label> 
  <p>Un empleado con acceso [ <code>0</code> ] solo podra acceder a fichas con este acceso.</p>
  <p>Un empleado con acceso [ <code>1</code> ] solo podra acceder a fichas con este acceso.</p>
  <p>Un empleado con acceso [ <code>Administrador</code> ] tendra acceso total.</p>
</div>
  <br>

  <button type="submit" class="btn btn-primary">Registrar</button>

</form>

</div>
      <!-- /.box -->

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  


  