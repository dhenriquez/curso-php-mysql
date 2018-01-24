
<?php

class Conexion{
	
	private $errs  = false;
	private $host  = 'localhost:8889';
	private $user  = 'root';
	private $pass  = 'root';
	private $ddbb  = 'login';
	
	private function conectar(){
		try{
			$c = mysql_connect($this->host,$this->user,$this->pass);
			if(!$c){
				throw new Exception('Error en conexión #' . mysql_errno());
			}
			$db = mysql_select_db($this->ddbb,$c);
			if(!$db){
				throw new Exception('Error seleccion base de datos #' . mysql_errno());
			}
		}catch(Exception $e){
			$this->error($e->getMessage());
		}
		return $c;
	}
	
	private function query($sql){
		$conexion = $this->conectar();
		if(!$this->error()){
			$r = mysql_query($sql,$conexion);
			if(mysql_errno($conexion)==0){
				$retorno = $r;
			}else{
				switch(mysql_errno()){
					case 1062:
						$this->error('Ese nombre de usuario ya existe en la base de datos');
					break;
					default:
						$this->error('Error en Query #' . mysql_errno());
					break;
				}
				
			}
		}else{
			$retorno = false;
		}
		mysql_close($conexion);
		return $retorno;
	}
	
	public function login($usuario=false,$contrasena=false){
		if($usuario && $contrasena){
			$respuesta = $this->query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND password ='$contrasena'");
			if($respuesta){
				if(mysql_num_rows($respuesta)==1){
					$retorno = true;
				}else{
					$this->error('Usuario y/o contraseña erróneos');
					$retorno = false;
				}
			}else{
				$retorno = false;
			}
		}else{
			$this->error('Usuario y/o contraseña vacíos');
		}
		return $retorno;
	}
	
	public function logeado(){
		if (isset($_SESSION['usuario'])){
			$retorno = true;
		}else{
			$this->error('Para acceder a este contenido tiene que estar logueado');
			$retorno = false;
		}
		return $retorno;
	}
	
	public function registrar($usuario=false,$password=false,$nombre=false,$apellido=false,$email=false,$dni=false){
		if($usuario&&$password&&$nombre&&$apellido&&$email&&$dni){
			$respuesta = $this->query("INSERT INTO usuarios VALUES ('$usuario', '$password', '$nombre', '$apellido', '$email', $dni)");
			if($respuesta){
				$retorno = true;
			}else{
				$retorno = false;
			}
		}else{
			$this->error('Todos los campos son requeridos');
			$retorno = false;
		}
		return $retorno;
	}
	
	public function error($msj=false){
		if($msj){
			return $this->errs = $msj;
		}else{
			return $this->errs;
		}
	}
	
}

?>





