<?php
defined('BASEPATH') OR exit('Acceso directo no permitido');

class Sitio extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('datos','form_validation','email'));
	}
	
	public function index(){
				
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
	
	public function youtube(){
				
		$header = array(
			'active' => __FUNCTION__
		);
		
		$youtube = $this->datos->YoutubePopular();
		
		$data = array(
			'titulo' => 'Youtube',
			'descripcion' => 'Los 10 videos más populares del día en Chile desde youtube.',
			'youtube' => $youtube
		);
		
		$this->load->view('header', $header);
		$this->load->view(__FUNCTION__.'_view', $data);
		$this->load->view('footer');
	}
	
	public function clima(){
		
		$header = array(
			'active' => __FUNCTION__
		);
		
		
		$clima = $this->datos->clima();
		
		$data = array(
			'titulo' => 'Clima',
			'descripcion' => 'El pronóstico del clima para hoy en la capital de Chile.',
			'clima' => $clima
		);
		
		$this->load->view('header', $header);
		$this->load->view(__FUNCTION__.'_view', $data);
		$this->load->view('footer');
	}
	
	public function contacto(){
				
		$header = array(
			'active' => __FUNCTION__
		);
		
		$data = array(
			'titulo' => 'Contacto',
			'descripcion' => 'Si necesitas más información sobre nosotros aquí nos puedes escribir.',
			'enviado' => $this->input->post('nombre') . ' tu contacto enviado con éxito!'
		);
		
		$this->form_validation->set_rules('nombre', 'Nombre', 'required', array('required' => 'El %s es requerido.'));
		$this->form_validation->set_rules('apellido', 'Apellido', 'required', array('required' => 'El %s es requerido.'));
		$this->form_validation->set_rules('email', 'Email', 'required', array('required' => 'El %s es requerido.'));
		$this->form_validation->set_rules('mensaje', 'Mensaje', 'required', array('required' => 'El %s es requerido.'));
		
		$this->load->view('header', $header);
		if($this->form_validation->run() == FALSE){
			$this->load->view(__FUNCTION__.'_view', $data);
		}else{
			$this->load->view(__FUNCTION__.'_enviado_view', $data);
		}
		$this->load->view('footer');
	}
	
}
?>