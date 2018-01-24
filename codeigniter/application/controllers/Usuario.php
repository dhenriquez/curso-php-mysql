<?php
defined('BASEPATH') OR exit('Acceso directo no permitido');

class Usuario extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('form_validation','email'));
		$this->load->model('usuario_model');
	}
	
	public function index(){
		redirect('usuario/login', 'refresh');
	}
	
	public function login(){
		$header = array(
			'active' => __FUNCTION__
		);
		
		$data = array(
			'titulo' => '¡Bienvenido!',
			'descripcion' => 'Aquí podrás encontrar información de ocio.'
		);
		
		$this->load->view('header', $header);
		$this->load->view(__FUNCTION__.'_view', $data);
		$this->load->view('footer');
	}
	
	public function registrar(){
		
		$header = array(
			'active' => __FUNCTION__
		);
		$data = array(
			'titulo' => '¡Registrar!',
			'descripcion' => 'Aquí puedes completar tus datos para poder registrarte.',
		);
		
		$this->form_validation->set_rules('nombre', 'Nombre completo', 'required', array('required' => 'El %s es requerido.'));
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[usuario.usuario]', array('required' => 'El %s es requerido.','is_unique'=>'El %s ya se encuentra en uso.'));
		$this->form_validation->set_rules('usuario', 'Usuario', 'required|is_unique[usuario.usuario]', array('required' => 'El %s es requerido.','is_unique'=>'El %s ya se encuentra en uso.'));
		$this->form_validation->set_rules('password', 'Contraseña', 'required', array('required' => 'El %s es requerida.'));
		
		$this->load->view('header', $header);
		if($this->form_validation->run() == FALSE){
			$this->load->view(__FUNCTION__.'_view', $data);
		}else{
			$email = $this->input->post('email');
			$nombre = $this->input->post('nombre');
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('password');
			
			$registro['email'] = $email;
			$registro['nombre'] = $nombre;
			$registro['usuario'] = $usuario;
			$registro['password'] = $password;
			
			$res = $this->usuario_model->registrar($registro);
			
			if($res){
				
				$data = array(
					'titulo' => '¡Gracias!',
					'descripcion' => 'Ya te encuentras inscrito en nuestro sitio!',
					'enviado' => $nombre . ' revisa tu correo para validar tu registro!',
				);
				$asunto = 'Registro de usuario';
				$mensaje = 'Te acabas de registrar en nuestro sitio.';

				$this->email->from('no-responder@dhenriquez.cl','Sitio de Prueba');
				$this->email->to($email);
				$this->email->subject($asunto);
				$this->email->message($mensaje);
				$this->email->send();
				$this->load->view(__FUNCTION__.'_enviado_view', $data);
				
			}else{
				$this->load->view(__FUNCTION__.'_view', $data);
			}
		}
		$this->load->view('footer');
	}
	
	public function perfil(){
		$header = array(
			'active' => __FUNCTION__
		);
		
		$data = array(
			'titulo' => '¡Bienvenido!',
			'descripcion' => 'Aquí podrás encontrar información de ocio.',
			
		);
		
		$this->load->view('header', $header);
		$this->load->view(__FUNCTION__.'_view', $data);
		$this->load->view('footer');
	}
	
	public function salir(){
		redirect('sitio', 'refresh');
	}
}
?>