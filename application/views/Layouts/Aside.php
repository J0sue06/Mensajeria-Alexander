<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Web | Mensajeria</title>

  <link rel="stylesheet" href="<?php echo base_url('Recursos/datatables-export/css/buttons.dataTables.min.css');?>">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('Recursos/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?php echo base_url('recursos/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('recursos/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('recursos/bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('recursos/dist/css/AdminLTE.min.css');?> ">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('recursos/dist/css/skins/_all-skins.min.css');?>">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>FichaController" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-cubes"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistema | WEB</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- Datos del Usuario -->
          <li class="dropdown user user-menu">
            <a  class="btn btn-danger" data-toggle="dropdown">
             
              <span style="margin-right:15px; font-size:17px;"  class="hidden-xs"> <i class="fa fa-gears"></i> </span>
            </a>
            <ul class="dropdown-menu">
            <br/>
            <label style="margin-left:55px; font-size:15px;">Usuario Actual: <?php echo $this->session->userdata("nombre")?> </label>
            <br/><br/>
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo base_url()?>LoginController/salir" class="btn btn-danger btn-flat">Cerrar Seccion</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <br/> <br/> 
        </div>
        <div style="font-size:14px; color:white; text-align:center">
        <label><?php echo $this->session->userdata("correo")?></label>
        </div>
        
        <div class="pull-center info" style="font-size:12px; color:white; text-align:center">
          <p style="font-size:20px;"></p>          
          <a><i class="fa fa-circle text-success"></i>En Linea</a>
        </div>
      </div>
      
     <div>
     <br/>
     </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">OPCIONES DEL SISTEMA</li>

     

        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-book-o"></i> <span>Fichas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>FichaController/Registro"><i class="fa fa-circle-o"></i> Registro de Ficha</a></li>            
             <li><a href="<?php echo base_url();?>"><i class="fa fa-circle-o"></i> Reporte de Fichas</a></li>
            
          </ul>
        </li>
                <!--Unicamente el usuario administrador podra registrar empleados -->
        <?php if ($this->session->userdata("acceso") != 'administrador') { ?>
         
        <li class="#">
          <a>  
         
            <i class="fa fa-cube"></i> <span>Empleados</span>

            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a  href="#" ><i class="fa fa-circle-o"></i> Registro de Empleados</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Lista de Empleados</a></li>            
          </ul>
        </li>
        <?php } else{ ?>

        <li class="treeview">
          <a readonly href="#">    
         
            <i class="fa fa-cube"></i> <span>Empleados</span>

            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a  href="<?php echo base_url();?>EmpleadosController/RegistroView" ><i class="fa fa-circle-o"></i> Registro de Empleados</a></li>
            <li><a href="<?php echo base_url();?>EmpleadosController/"><i class="fa fa-circle-o"></i> Lista de Empleados</a></li>            
          </ul>
        </li>
        <?php }  ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 

 <!-- Main content -->
 <section class="content">