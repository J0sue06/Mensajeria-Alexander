<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login</title>
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

    </style>
   
  </head>
  <body class="text-center">

    <form id="Login" class="form-signin" method="POST" action="<?php echo base_url()?>LoginController/acceder">
    
  <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1> <p><?php echo $this->session->userdata("nombre");?></p>
  
  <div class="form-group" id="usuariodiv">
  <label class="sr-only">Usuario</label>
  <input type="text" name="Usuario" class="form-control" placeholder="Usuario" autofocus>
    <div class="invalid-feedback">
    </div> 
  </div>

  <div class="form-group" id="clavediv">
  <label class="sr-only">Clave</label>
  <input type="password" name="Clave" class="form-control" placeholder="Clave">
    <div class="invalid-feedback">
    </div> 
  </div>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
  
</form>

<script src="<?php echo base_url('js/Login.js');?>"></script>


</body>
</html>