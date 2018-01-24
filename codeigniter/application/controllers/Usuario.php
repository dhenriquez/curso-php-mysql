<?php
defined('BASEPATH') OR exit('Acceso directo no permitido');

class Usuario extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('form_validation','email'));
	}
	
	public function index(){
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
			'titulo' => '¡Registrate!',
			'descripcion' => 'Para poder acceder puedes crear tu cuenta aquí.'
		);
		
		$this->load->view('header', $header);
		$this->load->view(__FUNCTION__.'_view', $data);
		$this->load->view('footer');
	}
	
	public function perfil(){
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
}
?>