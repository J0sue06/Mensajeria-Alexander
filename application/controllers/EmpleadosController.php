<?php
class EmpleadosController extends CI_Controller{

    //Constructor de la clase, en el se llaman al modelo y se carga una libreria.
    public function __construct()
    {
        parent:: __construct();
        $this->load->Model('EmpleadosModel'); 
        $this->load->library('form_validation');    
               
    }
    
    //Metodo por defecto al llamar al controlador
    public function index()
    {
        //Esto se utiliza para saber si el usuario realmente esta logueado en el sistema.
        if (!$this->session->userdata('activo')) {
            $this->load->view('Login/Login');
        }else
        {
            //Si esta logueado retorna una vista con datos obtenidos del modelo
            //Las vistas Aside y Foteer estan almacenadas en la carpeta de las vitas a fin de eliminar redundancia
            $rows = $this->EmpleadosModel->Todos();
            $this->load->view('layouts/Aside');
            $this->load->view('Empleados/Lista', compact("rows"));
            $this->load->view('layouts/Footer');
        }
        
    }


    //Cuando se quiere editar un empleado esta vista se encarga de llamar al modelo y
    //Pasarle por parametro el id y luego este le retorna todo lo correspondiente a este metodo5
    //Luego este carga una vista y a esa vista le pasa los datos relacionados a ese ID
    public function EditarView($id)   
    {   
        $row = $this->EmpleadosModel->ObtenerEmp($id);
        $this->load->view('layouts/Aside');
        $this->load->view('Empleados/Editar', compact("row"));
        $this->load->view('layouts/Footer');
    }

    //Cuando se necesita registrar un empleado, este metodo se encarga de cargar las vistas de registro
    public function RegistroView()   
    {   
        $this->load->view('layouts/Aside');
        $this->load->view('Empleados/Registro');
        $this->load->view('layouts/Footer');
    }

    //Este metodo se utiliza cuando se necesita cambiar el acceso al empleado
    public function Actualizar()
    {       
            //Aqui se obtienen los campos para luego pasarlos al metodo y hacer el Update a la tabla
            $id = $this->input->post('Id');            
            $acceso = $this->input->post('Acceso');
            
           //Se crea un arreglo con el nombre exacto del campo de la tabla donde se actualizara la informacion
           // Y se le asigna el valor obtenido de la vista
            $datos = array(                               
                'acceso' => $acceso 
                          );
                //Se llama al modelo pasandole el nuevo acceso y el id para identificar el empleado 
                //Si el modelo se ejecuta correctamente este redireciona a la lista de empleados
                if($this->EmpleadosModel->Cambios($id,$datos) == true)
                {                    
                    echo "correcto";
                    //redirect('EmpleadosController/');
                }else 
                {
                    echo "error";
                    //En caso de ocurrir un error se muestra este error por pantalla
                    
                }
    }
       
    //En este metodo se registra el empleado
    public function Registro()
    {
        //Aqui se obtienen los datos del formulario
        $nombre = $this->input->post('Nombre');
        $apellido = $this->input->post('Apellido');
        $cedula = $this->input->post('Cedula');        
        $telefono = $this->input->post('Telefono');
        $correo = $this->input->post('Correo');
        $clave = $this->input->post('Clave');
        $acceso = $this->input->post('Acceso');
        
        //Aqui se delimitan los errores ya que este devuelve un error con etiquetas de este estilo <p>Error</>
        // Y a la hora de leer estos errores con Ajax salen problemas
        $this->form_validation->set_error_delimiters('', '');
        //Aqui se crean los campos a utilizar por el validador de errores de CodeIgniter
        $Config = array(
            array(
                'field' => 'Nombre',
                'label' => 'Nombre',
                'rules' => 'required',
                'errors' => array(
                    'required' => '<span class="badge badge-primary">El campo [ %s ] es requerido.</span>'
                ),
            ),
            array(
                'field' => 'Apellido',
                'label' => 'Apellido',
                'rules' => 'required',
                'errors' => array(
                    'required' => '<span class="badge badge-primary">El campo [ %s ] es requerido.</span>'
                ),
            ),
            array(
                'field' => 'Cedula',
                'label' => 'Cedula',
                'rules' => 'required',
                'errors' => array(
                    'required' => '<span class="badge badge-primary">El campo [ %s ] es requerido.</span>'
                ),
            ),
            array(
                'field' => 'Telefono',
                'label' => 'Telefono',
                'rules' => 'required',
                'errors' => array(
                    'required' => '<span class="badge badge-primary">El campo [ %s ] es requerido.</span>'
                ),
            ),
            array(
                'field' => 'Correo',
                'label' => 'Correo',
                'rules' => 'required',
                'errors' => array(
                    'required' => '<span class="badge badge-primary">El campo [ %s ] es requerido.</span>'
                ),
            ),
            array(
                'field' => 'Clave',
                'label' => 'Clave',
                'rules' => 'required',
                'errors' => array(
                    'required' => '<span class="badge badge-primary">El campo [ %s ] es requerido.</span>'
                ),
            ),
        );
        
        //Se le pasa al metodo el arreglo ya configurado
        $this->form_validation->set_rules($Config);
            
            //Si el metodo devuelve un error este crea un arreglo con el nombre de los campos en el formulario -
            // - y los imprime en formato Json, luego este le dice al servidor que hay un estado 400
            if ($this->form_validation->run() == FALSE) 
            {
                $error = array(
                  'nombre' => form_error('Nombre'),
                  'apellido' => form_error('Apellido'),
                  'cedula' => form_error('Cedula'),
                  'telefono' => form_error('Telefono'),
                  'correo' => form_error('Correo'),
                  'clave' => form_error('Clave')
                );
                echo json_encode($error);
                $this->output->set_status_header(400);

            }else {
                  //En caso de que todo salga bien se crea un arreglo con el nombre exacto de los campos de la base de datos
                  // y luego se le pasa al modelo para insertarlos en la base de datos
                    $datos = array(                    
                    'nombre'=>$nombre, 
                    'apellido'=>$apellido,
                    'cedula'=>$cedula,
                    'telefono'=>$telefono,
                    'correo'=> $correo,
                    'clave' => ($clave),
                    'acceso' => $acceso
                );
             
                $this->EmpleadosModel->Guardar($datos);
                echo json_encode($datos);                  
             
            }
    }
 


}
?>