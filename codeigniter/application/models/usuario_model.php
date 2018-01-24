<?php

class Usuario_model extends CI_Model{
	
	public $nombre;
	public $email;
	public $usuario;
	public $password;
	public $activo = 0;
		
	public function get_usuarios(){
		$query = $this->db->get('usuario');
        return $query->result();
	}
	
	public function registrar($datos = array()){
		$this->usuario_nombre = $datos['nombre'];
		$this->usuario_email = $datos['email'];
		$this->usuario = $datos['usuario'];
		$this->password = $datos['password'];
		
		$this->db->insert('usuario',$this);
		
		return ($this->db->affected_rows() != 1) ? false : true;
		
	}
	
}

?>