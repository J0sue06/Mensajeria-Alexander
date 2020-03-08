<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model{

  //Este metodo es utilizado para guardar la ficha
    public function Guardar($data)
    {
       $this->db->insert('ficha', $data);
    }

    //Este es el metodo utilizado para cargar la vista de Reportes de Ficha, en esta se accede a diferentes tablas
    public function _show()
    {
      return $this->db->query("SELECT f.id_ficha, f.fecha, f.emisor, f.asignacion, f.acceso, a.documento, e.nombre, e.apellido FROM ficha f left join archivo a on f.id_ficha = a.id_ficha join empleados e on f.id_empleado = e.id_empleado ORDER by f.fecha ASC")->result();      
    } 

    //Este metodo se utiliza para obtener la ficha seleccionada y asi poder mostrarla en la vista para luego adjuntarle el documento
    public function _showEdit($id)
    {     
      $this->db->get('ficha');
      return $this->db->query("SELECT * FROM ficha WHERE id_ficha = {$id}")->row();      
    }

    //Con este metodo se guarda el nombre del archivo en la base de datos
    public function subir($data)
    {
    $this->db->insert('archivo', $data);
    }

    public function _showU()
    {     
      return  $this->db->query("SELECT e.nombre, e.apellido FROM empleados e ")->result();      
    }
}