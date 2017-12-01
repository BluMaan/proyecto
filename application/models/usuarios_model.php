<?php

class usuarios_model extends CI_Model {
    
    public function buscar_autentificacion($usuario, $clave) {
        $user = $this->db->select('*')->get_where('admin_usuarios', array(
                    'NOMBRE_USUARIO' => $usuario,
                    'CLAVE' => md5($clave)
                ))->row();
        return $user;
    }
    
    public function get_usuarios() {
      $this->db->select('*');
      $this->db->from('admin_usuarios');
      $this->db->join('admin_roles', 'admin_usuarios.ID_ROL = admin_roles.ID_ROL');
      $consulta = $this->db->get();
      return $consulta->result();
   }
    
}
