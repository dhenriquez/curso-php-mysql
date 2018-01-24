<?php

class Carrito{
	
	public $total = 0;
	private $productos = array();
	
	public function agregar($codigo){
		if(empty($_SESSION['carro'])){
			$_SESSION['carro'][] = $codigo;
		}else{
			$this->productos = $_SESSION['carro'];
			$this->productos[] = $codigo;
			$_SESSION['carro'] = $this->productos;
		}
		return true;
	}
	
	public function eliminar($index){
		$this->productos = $_SESSION['carro'];
		unset($this->productos[$index-1]);
		$_SESSION['carro'] = $this->productos;
		return true;
	}
	
	public function getTodos(){
		if(count($_SESSION['carro'])>0){
			return $_SESSION['carro'];
		}else{
			return false;
		}
	}
	
	public function sumarTotal($precio){
		$this->total = number_format($this->total + $precio,2);
	}
	
}

?>