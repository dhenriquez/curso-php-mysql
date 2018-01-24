<?php

class Usuario_model extends CI_Model{
	
	public $usuario_nombre;
	public $usuario_email;
	public $usuario;
	public $password;
	public $activo = 0;
		
	public function login($datos = array()){
		$this->usuario = $datos['usuario'];
		$this->password = $datos['password'];
		$query = $this->db->get_where('usuario',array('usuario'=>$this->usuario,'password'=>$this->password));
		return ($query->num_rows()>0) ? $query->row() : false;
	}
	
	public function registrar($datos = array()){
		$this->usuario_nombre = $datos['nombre'];
		$this->usuario_email = $datos['email'];
		$this->usuario = $datos['usuario'];
		$this->password = $datos['password'];
		$this->db->insert('usuario',$this);
		return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
		
	}
	
	public function validar($key){
		$this->db->set('activo',1);
		$this->db->where('md5(usuario_ID)',$key);
		$this->db->update('usuario');
		return ($this->db->affected_rows() == 1) ? true : false;
	}
	
}

?>