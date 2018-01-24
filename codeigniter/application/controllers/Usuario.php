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
		
		$this->load->model('usuario_model');
		$res = $this->usuario_model->getusuarios();
		
		$header = array(
			'active' => __FUNCTION__
		);
		
		$data = array(
			'titulo' => '¡Registrar!',
			'descripcion' => 'Aquí puedes completar tus datos para poder registrarte.',
			'enviado' => $this->input->post('nombre') . ' revisa tu correo para validar tu registro!',
			'query' => ''
		);
		
		$this->form_validation->set_rules('nombre', 'Nombre completo', 'required', array('required' => 'El %s es requerido.'));
		$this->form_validation->set_rules('email', 'Email', 'required', array('required' => 'El %s es requerido.'));
		$this->form_validation->set_rules('usuario', 'Usuario', 'required', array('required' => 'El %s es requerido.'));
		$this->form_validation->set_rules('password', 'Contraseña', 'required', array('required' => 'El %s es requerida.'));
		
		$this->load->view('header', $header);
		if($this->form_validation->run() == FALSE){
			$this->load->view(__FUNCTION__.'_view', $data);
		}else{
			/*$email = $this->input->post('email');
			$nombre = $this->input->post('nombre');
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('password');
			$asunto = 'Registro de usuario';
			$mensaje = '';
			
			$this->email->from($email,$nombre);
			$this->email->to($this->email_para);
			$this->email->subject($asunto);
			$this->email->message($mensaje);
			$this->email->send();*/
			$this->load->view(__FUNCTION__.'_enviado_view', $data);
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