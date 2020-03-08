<?php

class FichaController extends CI_Controller {

    //Metodo constructor en el se carga el modelo
    //Tambien se cargan algunas librerias 
    public function __construct()
    {
        parent:: __construct();
        $this->load->Model('UsuariosModel'); 
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper(array('download', 'file'));
       
    }

    //Funcion por defecto del controlador
	public function index()
	{
        //Se revisa si el usuario esta logueado en el sistema
        if (!$this->session->userdata('activo')) {
            $this->load->view('Login/Login');
        }else
        { 
        //Si esta logueado este llama una vista y le pasa los datos
		$rows = $this->UsuariosModel->_show();

        $this->load->view('layouts/aside');
		$this->load->view('usuarios/Lista', compact("rows"));
        $this->load->view('layouts/footer');
        }
    }

    //Este metodo es utilizado para cargar el formulario de registro de ficha
    public function Registro()
    {
        $this->load->view('layouts/aside');
		$this->load->view('usuarios/Ficha');
		$this->load->view('layouts/footer');
    }
  
    //Este metodo es utilizado mostrar una vista donde se muestran los datos de la ficha seleccionada
    //Pero esta vista es utilizada para cargar a esa ficha seleccionada un documento PDF
    public function cargar($id)
    {
        $res = $this->UsuariosModel->_showEdit($id);
        $this->load->view('layouts/aside');
		$this->load->view('usuarios/Editar', compact("res"));
		$this->load->view('layouts/footer');
    }

    //Una ves se a seleccionado el documento PDF, se guarda su nombre en la base de datos y en la carpeta seleccionada en la configuracion
    public function subir()
    {        
        $mi_archivo = 'pdf';
        //En esta carpeta se van a almacenar los documentos cuando se guarden
        $config['upload_path'] = "./Recursos/upload/";
        //Aqui se indica que solo puede aceptar estos documentos        
        $config['allowed_types'] = "*";
        //Este es el tamano maximo del archivo (5 mb)
        $config['max_size'] = "5000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";
        //luego se llama al metodo de CodeIgniter y se le pasa la configuracion anterior
        $this->load->library('upload', $config);
        //Se inicializa el metodo con dicha configuracion
        $this->upload->initialize($config);
       
        //Se ve el estado de la ejecucion
        if (!$this->upload->do_upload($mi_archivo)) {           
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();            
            return;
        }
        //Se obtiene todo la informacion relacionada al archivo a subir
        $n = array("rows" => $this->upload->data());
        //Se obtiene el nombre del documento a subir
        $pdf = $n["rows"]['file_name'];
        
        $data['uploadSuccess'] = $this->upload->data(); 
        
        //Se obtiene el id desde el formulario para poder identificar cual ficha se le va a adjuntar el documento     
        $id = $this->input->post("id");

        //Se crea un arreglo con los nombres exactos de la tabla para poder guardar el nombre del documento a subir
        $documento = array(
            'id_ficha'=> $id,
            'documento' => $pdf
        );
        //Se le pasa al modelo el arreglo con los datos
        $this->UsuariosModel->subir($documento);
        //Luego se redirecciona a la vista anterior
        redirect('FichaController/');
    }

    //Este metodo es utilizado para descargar los archivos guardados
    public function descargar($name)
    {
        //Mediante el dato que recibe esta funcion se busca en la carpeta donde se guardan los documentos con el metodo de CodeIgniter file_get_contents()
        $data = file_get_contents("./Recursos/upload/".$name);
        //Una ves obtenido ese documento con el metodo de CodeIgniter force_download se descarga el documento, este se descarga con el nombre exacto del documento
        force_download($name,$data);
    }

    //Este metodo es utilizado para guardar una ficha
    public function InsertarFicha()
    {             
        //Se obtienen los datos del formulario        
            $nombre = $this->input->post('Nombre');
            $recepcion = $this->input->post('Recepcion');
            $entrega = $this->input->post('Entrega');
            $asignado = $this->input->post('Asignado');     
            $acceso = $this->input->post('Acceso');      

            //Se delimitan los errores para que Ajax los lea sin problemas
            $this->form_validation->set_error_delimiters('', '');
            
            //Se crea un arreglo con cada uno de los campos del formulario de registro para validarlos
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
                    'field' => 'Recepcion',
                    'label' => 'Recepcion',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '<span class="badge badge-primary">El campo [ %s ] es requerido.</span>'
                    ),
                ),
                array(
                    'field' => 'Entrega',
                    'label' => 'Entrega',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '<span class="badge badge-primary">El campo [ %s ] es requerido.</span>'
                    ),
                ),
                array(
                    'field' => 'Asignado',
                    'label' => 'Asignado',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '<span class="badge badge-primary">El campo [ %s ] es requerido.</span>'
                    ),
                )
            );
            //Se le pasa la configuracion anterior al metodo de CodeIgniter form_validation()
            $this->form_validation->set_rules($Config);
            //Aqui se comprueba que los campos esten correctos
            if ($this->form_validation->run() == FALSE) 
            {
                //Si hay algun error se crea un arreglo con los datos 
                $error = array(
                  'nombre' => form_error('Nombre'),
                  'recepcion' => form_error('Recepcion'),
                  'entrega' => form_error('Entrega'),
                  'asignado' => form_error('Asignado')
                );
                //Luego se imprime el arreglo en formato Json para que Ajax los lea sin problemas
                echo json_encode($error);
                //Despues se le da al servidor un estado 400
                $this->output->set_status_header(400);

            }else {
                //En caso de salir todo correcto se crea este arreglo con los datos anteriores
                    $userId = $this->session->userdata("id"); //Aqui se imprime el id del usuario logueado en el sistema para identificar el usuario que creo esta ficha
                    $datos = array(
                    'id_empleado'=> $userId,
                    'emisor'=>$nombre, 
                    'f_recepcion'=>$recepcion,
                    'f_entrega'=>$entrega,
                    'asignacion'=>$asignado,
                    'fecha'=> date("Y-m-d H:i:s"),
                    'acceso'=> $acceso
                );
                // Y por ultimo se llama al modelo y se le pasa el arreglo anterior
                $this->UsuariosModel->Guardar($datos);
                echo json_encode($datos);                  
             
            }
       
    }    
    
    //Esta funcion es utilizada para cargar los usuarios en el formulario de registro de ficha
    public function listarU()
    {
        //Se llama al modelo y se obtienen los datos del usuario
        $rows = $this->UsuariosModel->_showU();
        //Luego se imprime en formato Json para que mediante Js imprimirlos en un Select en dicha vista
        echo json_encode($rows);
    }
  
}
