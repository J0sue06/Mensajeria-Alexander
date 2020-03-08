<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmpleadosModel extends CI_Model{
    
    //Metodo utilizado para guardar empleados en la base de datos
    public function Guardar($data)
    {
        $this->db->insert('empleados', $data);
    }

    //Metodo utilizado para guardar los cambios del empleado como es el tipo de acceso que es tiene en el sistema
    public function Cambios($id,$data)
    {
        $this->db->where('id_empleado', $id);
        $this->db->update('empleados', $data);

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    //Esta funcion se utiliza para poder pasarle los datos a la vista cambiar acceso de los empleados
    public function ObtenerEmp($id)
    {
        $this->db->where('id_empleado', $id);
        $res = $this->db->get('empleados');
        return $res->row();
    }

    //Este metodo es utilizado para obtener todos los empleados del sistema
    public function Todos()
    {
        $res = $this->db->get('empleados');
        return $res->result();
    }
}
?>