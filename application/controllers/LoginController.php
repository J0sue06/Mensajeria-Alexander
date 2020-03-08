<?php
class LoginController extends CI_Controller{

    //Metodo contructor donde se carga el modelo
    public function __construct()
    {
        parent:: __construct();
        $this->load->Model('LoginModel');            
    }

    //Este es el metodo por defecto se valida si el usuario esta logueado lo manda al inicio sino lo mantiene en la vista de login
    public function index()
    {
        if (!$this->session->userdata('activo')) {
            $this->load->view('Login/Login');
            
        }else{
            redirect('FichaController');
        }
        
    }

    //Este es el metodo encargado de loguear al empleado/administrador
    public function acceder()
    {
        //Se obtienen los datos del formulario de login
        $usuario = $this->input->post('Usuario');
        $clave = $this->input->post('Clave');  
        
        if($usuario != null && $clave != null )
        {
        //Se le pasan al modelo 
        $respon =$this->LoginModel->ingresar($usuario,$clave);
        //Si la respues del modelo es false entonces vuelve a cargar la vista de login
        if(!$respon)
        {
            echo "error";
        }
        else //En caso contrario se crea un arrelo con algunos datos del usuario
        {
            
            echo "correcto";

            $datos= array(
                'id'=> $respon->id_empleado,
                'nombre'=> $respon->nombre.' '.$respon->apellido,
                'acceso'=> $respon->acceso,
                'correo'=> $respon->correo,
                'activo'=>true
            );
            //Luego el arreglo con esos datos se le manda a la funcion de CodeIgniter 
            $this->session->set_userdata($datos);            

        }
    }else{
        echo "vacio";
    }
       
    }
   
    //Este metodo es utilizado para cerrar la sesion del usuario logueado
    public function salir()
    {
        $this->session->sess_destroy();
        //Luego se redireccion al controllador login
        redirect('LoginController');
    }

}