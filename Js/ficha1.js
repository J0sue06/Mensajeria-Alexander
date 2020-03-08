(function($) {
    
    listarUsuarios();
    //Cuando en el formulario de registro de Ficha se hace click en guardar se ejecuta esta funcion
    $("#guardar").submit(function(ev)
    {
      //Se evita que se recargue la pagina
       ev.preventDefault();
       $.ajax({
           url: 'InsertarFicha', //Direccion del controlador donde ira esta funcion
           type: 'POST', //Tipo de metodo 
           data: $(this).serialize(),
           success: function(datos) {
           //Si sale todo bien se limpian los campos del formulario      
           limpiarcampos();
           //Luego se lanza esta alerta de SweetAlert2
           Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Ficha Creada Exitosamente!',
            showConfirmButton: false,
            timer: 1500
          })
           },
           error: function(xhr) { //En caso de error entra en esta funcion
               if(xhr.status == 400) //Verifica el estado del servidor que debe ser 400
               {
                $("#nombre > input").removeClass('is-invalid');
                   //Se convierten a Json los errores que devuelve el arreglo con los campos de errores en el controlador
                   var json = JSON.parse(xhr.responseText);
                   if(json.nombre.length != 0)
                   {
                       $("#nombrediv > div").html(json.nombre); // Muestra los errores debajo de la caja de texto
                       $("#nombrediv > input").addClass('is-invalid'); // Le agrega esta clase a la caja de texto
                   }
                   if(json.recepcion.length != 0)
                   {
                       $("#recepciondiv > div").html(json.recepcion);
                       $("#recepciondiv > input").addClass('is-invalid');
                   }
                   if(json.entrega.length != 0)
                   {
                       $("#entregadiv > div").html(json.entrega);
                       $("#entregadiv > input").addClass('is-invalid');
                   }
                   if(json.asignado.length != 0)
                   {
                       $("#asignadodiv > div").html(json.asignado);
                       $("#asignadodiv > input").addClass('is-invalid');
                   }
                   if(json.acceso.length != 0)
                   {
                       $("#documentodiv > div").html(json.acceso);
                       $("#documentodiv > input").addClass('is-invalid');
                   }
               }
           },
       });
    });

    //Esta funcion es utilizada para limpiar los campos del formulario
    function limpiarcampos()
    {
        document.getElementById("guardar").reset();  
    }  

    //Esta funcion es utilizada para llenar el Select donde salen los usuarios disponibles para asignales una ficha
    function listarUsuarios() {
        
        $.ajax({
          url: 'listarU', //Direccion del controlador donde ira esta funcion
          type: 'POST', //Tipo de metodo
          DataType: 'json', //Formato de los datos 
          success: function(data) {
            
            var valor= '"<option Disabled Selected>Selecionar</option>"'; 

            $.each (JSON.parse(data), function (i, product) {
               
                valor += 
               "<option>" + product.nombre + " " + product.apellido + "</option>";                                
              
            })
            $("#Asignado").html(valor);           
            
          }
        });
      }

     



})(jQuery)