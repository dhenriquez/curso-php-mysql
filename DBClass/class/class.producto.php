<?php

class Producto{
	
	private $db;
	
	public function __construct($DB){
		$this->db = $DB;
	}
	
	public function delProducto(){
		$where = array(
			'codigo' => '1007',
		);
		return $this->db->delete('productos', $where);
	}
	
	public function getProductos(){
		return $this->db->select('productos');
	}
	
	public function error(){
		if($this->db->error){
			return $this->db->error;
		}else{
			return false;
		}
	}
}

?>