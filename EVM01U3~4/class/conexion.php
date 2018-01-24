<?php

class Conexion{
	
	private $user   = 'root';
	private $pass   = 'root';
	private $ddbb   = 'carro_compras';
	private $host   = 'localhost';
	private $conn   = false;
	public  $error  = false;
	
	public function __construct(){
		$this->conectar();
	}
	
	public function __destruct(){
		$this->conn = NULL;
	}
	
	private function conectar(){
		try{
			$this->conn = @new PDO('mysql:host=' . $this->host . ';dbname=' . $this->ddbb . ';charset=utf8', $this->user,$this->pass);
		}catch(PDOException $e){
			$this->error = 'Error: ' . $e->getMessage();
		}
	}
	
	public function query($sql = false){
		if($sql){
			$tipo = strtoupper(substr($sql,0,6));
			switch($tipo){
				case 'SELECT':
					$query = $this->conn->prepare($sql);
					if($query->execute()){
						if($query->rowCount()>0){
							return $query->fetchAll(PDO::FETCH_OBJ);
						}else{
							$this->error =  'Error: No existen datos ['.$query->errorCode().']';
							return false;
						}
					}else{
						$this->error =  'Error: SELECT ['.$query->errorCode().']';
						return false;
					};
				break;
				case 'INSERT':
				case 'UPDATE':
				case 'DELETE':
				default:
					$this->error = 'Error: Consulta no permitida.';
					return false;
				break;
			}
		}else{
			$this->error = 'Error: No existe consulta SQL.';
			return false;
		}
	}
	
}

?>