<?php

class Persona{
	
	private $nombre;
	private $apellido;
	private $fecha_nacimiento;
	
	function __construct($nombre, $apellido, $fecha_nacimiento){
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fecha_nacimiento = $fecha_nacimiento;
	}
	private function calcular_edad(){
		return floor((strtotime(date('Y-m-d')) -  strtotime($this->fecha_nacimiento))/(365*60*60*24));
	}
	public function imprime_caracteristicas(){
		echo "Nombre: " . $this->nombre . "<br>";
		echo "Apellido: " . $this->apellido . "<br>";
		echo "Edad: " . $this->calcular_edad() . "<br>";
	}
	
}

?>