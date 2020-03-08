 <!-- Default box -->
 <div class="box">
     <div class="box-header with-border">
       <h3 class="box-title">Editar Ficha</h3>

       <div class="box-tools pull-right">
         <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                 title="Collapse">
           <i class="fa fa-minus"></i></button>
         <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
           <i class="fa fa-times"></i></button>
       </div>
     </div>
     <div class="box-body">


     <!--Formulario para cargar archivo -->
<form>

  <div class="form-group" id="nombrediv">
    <label >Quien envia</label>
    <input disabled type="text" class="form-control" value="<?php echo $res->emisor; ?>">
      
  </div>
  <div class="form-group" id="recepciondiv">
    <label >Fecha de recepcion</label>
    <input disabled type="text" class="form-control" value="<?php echo $res->f_recepcion; ?>" >
     
  </div>
  <div class="form-group" id="entregadiv">
    <label >Fecha de entrega</label>
    <input disabled  type="text" class="form-control" value="<?php echo $res->f_entrega; ?>" >
   
  </div>
  <div class="form-group" id="asignadodiv" >  
      <label>Empleado asignado</label>
      <input disabled type="text" class="form-control" value="<?php echo $res->asignacion; ?>" >
       
  </div>  
 
</form>

<form id="cargarDocu" action="<?php echo base_url();?>FichaController/subir" method="post" enctype="multipart/form-data">

<div class="form-group">
<input name="id" type="hidden" class="form-control" value="<?php echo $res->id_ficha; ?>">

<label>Subir Documento PDF</label>
<input type="file" name="pdf">

</div>

<div class="form-group"> 
<button class="btn btn-primary" type="submit">Subir archivo</button>
</div>

</form>


</div>
      <!-- /.box -->

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->