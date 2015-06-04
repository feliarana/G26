<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('register_model');
	}

	function index () {
		$this->load->view("register_view");
	}

	function verificarDatos() { // AGREGAR QUE VERIFIQUE QUE NO QUEDE CAMPOS VACIOS
		$datos = array(
			'DNI' => $this->input->post('DNI'),
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono'),
			'userAdmin' => false
			);
		$query = $this->register_model->verificar_email($datos['email']);
		if($query) { // Si devuelve true, se registra el usuario, se crea la sesion y se carga la vista correspondiente
			$this->register_model->agregar_usuario($datos);
			$idUsuario = $this->register_model->obtenerIdUsuario($datos['email']); // Retorna el id del usuario, como el id es un autoincremental no lo sabemos ya que la BD lo genera por su cuenta, entonces lo obtenemos mediante una consulta
			$user = array('email' => $datos['email'],
				'nombre' => $datos['nombre'],
				'apellido' => $datos['apellido'],
				'idUsuario' => $idUsuario,
				'login' => true);
			$this->session->set_userdata($user);
			$this->load->view('index_view');
		}
		else
			echo 'El email ya se encuentra registrado';
	}
}

?>