<?php

class Conexion{
	
	private $conn  = false;
	public  $error = false;
	
	private $db_user = 'root';
	private $db_pass = 'root';
	private $db_host = 'localhost';
	private $db_name = 'carro_compras';
	
	public function __construct(){
		$this->conectar();
	}
	
	private function conectar(){
		try{
			$this->conn = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8', $this->db_user, $this->db_pass);
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}catch(PDOException $e){
			$this->setError($e->getCode(), $e->getMessage());
		}
	}
	
	public function select($tabla, $where=false){
		if($where && is_array($where)){
			$param = array();
			$valor = array();
			foreach($where as $k=>$v){
				if(!empty($v)){
					$param[] = $k . " LIKE ?";
					$valor[] = $v;
				}
			}
		}
		if(count($valor)){
			$sql = "SELECT * FROM `$tabla` WHERE " . implode(' AND ', $param);
			$query = $this->conn->prepare($sql);
			$query->execute($valor);
		}else{
			$sql = "SELECT * FROM `$tabla`";
			$query = $this->conn->prepare($sql);
			$query->execute();
		}
		if($query->rowCount()>0){
			return $query->fetchAll(PDO::FETCH_OBJ);
		}else{
			return false;
		}
	}
	
	public function insert($tabla, $data){
		if(!is_array($data)){
			return false;
		}
		$param = array();
		$valor = array();
		foreach($data as $k=>$v){
			if(!empty($v)){
				$param[] = '?';
				$valor[] = (!isset($v)) ? NULL:$v;
			}
		}
		if(count($valor)){
			$sql = "INSERT INTO `$tabla` VALUES (" . implode(',', $param) . ")";
			$query = $this->conn->prepare($sql);
			if($query->execute($valor)){
				return $this->conn->lastInsertId();
			}else{
				return false;
			}
		}else{
			return false;
		}
		if($query->rowCount()>0){
			return $query->fetchAll(PDO::FETCH_OBJ);
		}else{
			return false;
		}
	}
	
	public function update($tabla, $data, $where){
		if(!is_array($data) || !is_array($where)){
			return false;
		}
	}
	
	public function delete($tabla, $where){
		if(!is_array($where)){
			return false;
		}
		$param = array();
		$valor = array();
		foreach($where as $k=>$v){
			if(!empty($v)){
				$param[] = $k . " LIKE ?";
				$valor[] = $v;
			}
		}
		if(count($valor)){
			$sql = "DELETE FROM `$tabla` WHERE " . implode(' AND ', $param);
			$query = $this->conn->prepare($sql);
			if($query->execute($valor)){
				return true;
			}else{
				return false;
			};
		}else{
			return false;
		}
	}
	
	public function query($sql=false){
		if($sql){
			$query = $this->conn->prepare($sql);
			$query->execute();
			if($query->rowCount()>0){
				return $query->fetchAll(PDO::FETCH_OBJ);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	private function setError($errn, $errs){
		switch($errn){
			case 1049:
				$this->error = 'Error #' . $errn . ": Base de datos incorrecta.";
			break;
			case 2002:
				$this->error = 'Error #' . $errn . ": Host desconocido.";
			break;
			case 1045:
				$this->error = 'Error #' . $errn . ": usuario o contraseña incorrecta.";
			break;
			default:
				$this->error = 'Error #' . $errn . " " . $errs;
			break;
		}
	}
}

?>