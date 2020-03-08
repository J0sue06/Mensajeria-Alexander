<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{

    //Este metodo es utilizado para poder loguear un usuario en el sistema
    public function ingresar($usuario,$clave)
    {
       $this->db->where("correo",$usuario);
       $this->db->where("clave",$clave);

       $res = $this->db->get("empleados");
        if($res->num_rows() > 0)
        {
            return $res->row();
        }
    }
}