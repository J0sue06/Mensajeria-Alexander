(function($){

    $("#empleado").submit(function(ev)
    {
       ev.preventDefault();
       $.ajax({
           url: 'Registro',
           type: 'POST',
           data: $(this).serialize(),
           success: function(datos) {

           limpiarcampos();
           Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Empleado Registrado Exitosamente!',
            showConfirmButton: false,
            timer: 1500
          })
          
           },
           error: function(xhr) {
               if(xhr.status == 400)
               {
                $("#nombre > input").removeClass('is-invalid');
                   var json = JSON.parse(xhr.responseText);
                   if(json.nombre.length != 0)
                   {
                       $("#nombrediv > div").html(json.nombre);
                       $("#nombrediv > input").addClass('is-invalid');
                   }
                   if(json.apellido.length != 0)
                   {
                       $("#apellidodiv > div").html(json.apellido);
                       $("#apellidodiv > input").addClass('is-invalid');
                   }
                   if(json.cedula.length != 0)
                   {
                       $("#ceduladiv > div").html(json.cedula);
                       $("#ceduladiv > input").addClass('is-invalid');
                   }
                   if(json.telefono.length != 0)
                   {
                       $("#telefonodiv > div").html(json.telefono);
                       $("#telefonodiv > input").addClass('is-invalid');
                   }
                   if(json.correo.length != 0)
                   {
                       $("#correodiv > div").html(json.correo);
                       $("#correodiv > input").addClass('is-invalid');
                   }
                   if(json.clave.length != 0)
                   {
                       $("#clavediv > div").html(json.clave);
                       $("#clavediv > input").addClass('is-invalid');
                   }
               }
           },
       });
    });


    function limpiarcampos()
    {
        document.getElementById("empleado").reset();  
    }

    const volver = document.querySelector("#volver");
    
    volver.addEventListener("click", function(evento){
        window.location.href = "http://localhost/system/EmpleadosController";
    });
    

    $("#EditarEmpleado").submit(function(ev){
        ev.preventDefault();
 
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            success: function(res){
             
                if (res === 'correcto') 
                {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Actualizado Correctamente!',
                        showConfirmButton: false,
                        timer: 1500
                      })
              
                }
             
 
            },
            error: function(){
                
            }
        });
 
     });
 







})(jQuery)