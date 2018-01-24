<?php

class Producto{
	
	private $db;
	
	public $codigo;
	public $producto;
	public $descripcion;
	public $precio;
	
	public function __construct($conn){
		$this->db = $conn;
	}
	
	public function setProducto($codigo){
		if(!$this->db->error){
			$res = $this->db->query('SELECT * FROM productos WHERE codigo = ' . $codigo . ';');
			if($res){
				$return = array(
					'error' => false,
					'mensaje' => 'Producto encontrado',
					'data'=>$res[0]
				);
				$this->codigo = $res[0]->codigo;
				$this->producto = $res[0]->producto;
				$this->descripcion = $res[0]->descripcion;
				$this->precio = $res[0]->precio;
			}else{
				$return = array(
					'error' => true,
					'mensaje' => $this->db->error
				);
			}
		}else{
			$return = array(
				'error' => true,
				'mensaje' => $this->db->error
			);
		}
		return $return;
	}
	
	public function getTodos(){
		if(!$this->db->error){
			$res = $this->db->query('SELECT * FROM productos');
			if($res){
				$return = array(
					'error' => false,
					'data' => $res
				);
			}else{
				$return = array(
					'error' => true,
					'mensaje' => $this->db->error
				);
			}
		}else{
			$return = array(
				'error' => true,
				'mensaje' => $this->db->error
			);
		}
		
		return $return;
	}
	
}

?>