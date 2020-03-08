$(document).on("ready", login);

function login()
{
    $("#Login").submit(function(ev){
       ev.preventDefault();

       $.ajax({
           url: $(this).attr("action"),
           type: $(this).attr("method"),
           data: $(this).serialize(),
           success: function(respon){
            
            if(respon === 'vacio')
            {
                Swal.fire('Debe llenar los campos porfavor!') 
            }
            if(respon === 'error'){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El Usuario y/o Clave incorrectas!'                
                  })
            }
            if (respon === 'correcto') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Bienvenido al sistema!',
                    showConfirmButton: false,
                    timer: 1500
                  }) 
                window.location.href = "http://localhost/system/FichaController";
            }

           },
           error: function(){
               
           }
       });

    });
}