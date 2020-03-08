 <!-- Default box -->
 <div class="box">
     <div class="box-header with-border">
       <h3 class="box-title">Creacion de Ficha</h3>

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
<form  method="post" id="guardar" enctype='multipart/form-data'>

  <div class="form-group" id="nombrediv">
    <label >Quien envia</label>
    <input id="Nombre1" name="Nombre" type="text" class="form-control" placeholder="Empresa o Persona que envia el documento">
    <div class="invalid-feedback">
    </div>    
  </div>
  <div class="form-group" id="recepciondiv">
    <label >Fecha de recepcion</label>
    <input id="Recepcion" name="Recepcion" type="date" class="form-control">
    <div class="invalid-feedback">
    </div>  
  </div>
  <div class="form-group" id="entregadiv">
    <label >Fecha de entrega</label>
    <input id="Entrega" name="Entrega" type="date" class="form-control">
    <div class="invalid-feedback">
    </div> 
  </div>
  <div class="form-group" id="asignadodiv" >  
      <label for="inputState">Empleado asignado</label>
      <select id="Asignado" name="Asignado" class="form-control">
        <option selected>Seleccionar empleado</option>
        
      </select>  
      <div class="invalid-feedback">
    </div>   
  </div> 

  <div class="form-group" id="accesodiv" >  
      <label for="inputState">Nivel de Acceso</label>
      <select name="Acceso" class="form-control">
        <option selected disabled selected>Seleccionar</option>
        <option selected>1</option>
        <option selected>0</option>
      </select>  
      <div class="invalid-feedback">
    </div>   
  </div>  

<div class="form-group">
<label>Nota:</label> 
  <p>Una ficha con acceso [ <code>0</code> ] solo sera vista por usuarios que sean administrador.</p>
  <p>Una ficha con acceso [ <code>1</code> ] solo sera vista por usuarios que tengan este acceso.</p>
</div>
  <br>
 
  <div class="form-group">
  <button type="submit" class="btn btn-primary">Crear Ficha</button>   
  </div>
  

</form>

</div>
      <!-- /.box -->

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

