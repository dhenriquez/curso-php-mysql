<?php
defined('BASEPATH') OR exit('Acceso directo no permitido');

class Usuario extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('form_validation','email','session'));
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
			'descripcion' => 'Aquí puedes entrar en tu perfil de usuario.',
			'error' => false
		);
		
		$this->form_validation->set_rules('usuario', 'Usuario', 'required', array('required' => 'El %s está vacío.'));
		$this->form_validation->set_rules('password', 'Contraseña', 'required', array('required' => 'La %s está vacía.'));
		
		
		$this->load->view('header', $header);
		if($this->form_validation->run() == FALSE){
			$this->load->view(__FUNCTION__.'_view', $data);
		}else{
			$login['usuario'] = $this->input->post('usuario');;
			$login['password'] = $this->input->post('password');;
			$res = $this->usuario_model->login($login);
			if($res){
				$this->session->set_userdata($res);
				redirect('usuario/perfil', 'refresh');
			}else{
				$data['error'] = 'Usuario y/o contraseña incorrectos.';
				$this->load->view(__FUNCTION__.'_view', $data);
			}
			
		}
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
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[usuario.usuario_email]', array('required' => 'El %s es requerido.','is_unique'=>'El %s ya se encuentra en uso.'));
		$this->form_validation->set_rules('usuario', 'Usuario', 'required|is_unique[usuario.usuario]', array('required' => 'El %s es requerido.','is_unique'=>'El %s ya se encuentra en uso.'));
		$this->form_validation->set_rules('password', 'Contraseña', 'required', array('required' => 'La %s es requerida.'));
		
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
				$link = site_url('usuario/validar') . '?k=' . md5($res);
				$asunto = 'Registro de usuario';
				$mensaje = '<p>Te acabas de registrar en nuestro sitio. Para validar el registro copia y pega en tu navegador el siguiente link: ' . $link . '</p><div itemscope itemtype="http://schema.org/EmailMessage"><div itemprop="potentialAction" itemscope itemtype="http://schema.org/ViewAction"><link itemprop="target" href="'.$link.'"/><meta itemprop="name" content="Validar"/></div><meta itemprop="description" content="Validar"/></div>';

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
		if($this->session->has_userdata('usuario')){
			$header = array(
				'active' => __FUNCTION__
			);
			
			$default = "https://www.somewhere.com/homestar.jpg";
			$size = 250;
			$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->session->usuario_email ) ) ) . "?s=" . $size;
			
			$data = array(
				'titulo' => '¡Bienvenido!',
				'descripcion' => 'Aquí podrás encontrar información de ocio.',
				'grav_url' => $grav_url

			);

			$this->load->view('header', $header);
			$this->load->view(__FUNCTION__.'_view', $data);
			$this->load->view('footer');
		}else{
			redirect('usuario/login', 'refresh');
		}
	}
	
	public function validar(){
		$k = $this->input->get('k');
		$res = $this->usuario_model->validar($k);
		if($res){
			redirect('usuario/login', 'refresh');
		}else{
			redirect('sitio', 'refresh');
		}
	}
	
	public function salir(){
		$this->session->unset_userdata('usuario');
		redirect('usuario/login', 'refresh');
	}
}
?>