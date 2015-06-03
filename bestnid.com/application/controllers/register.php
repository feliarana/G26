<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('user_model');
		$this->load->library('session');
	}

	function index (){
		$this->load->view("user_view/register_view");
	}

	function verificarDatos(){ //AGREGAR QUE VERIFIQUE QUE NO QUEDE CAMPOS VACIOS
		$datos= array(
			'DNI' => $this->input->post('DNI'), 
			'nombre' => $this->input->post('nombre'), 
			'apellido' => $this->input->post('apellido'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),  
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono'),
			'userAdmin' => 0	
			);
		$query = $this->user_model->verificar_email($datos['email']);  // me guardo la query para tener los datos del usuario a lmacenar
		$usuario = $query->result();
		if ($query->num_rows == 0 ){ //Si devuelve nada, se registra al usuario , se crea la sesion y se carga la vista correspondiente.
			$this->user_model->agregar_usuario($datos); //Apartir de aca para abajo, se crea la sesion
			$user = array(
				'email'=> $datos['email'],
				'nombre'=> $datos['nombre'],
				'apellido'=> $datos['apellido'],
				'login'=> true
				);

			$this->session->set_userdata($user);
			$this->load->view('index_view'); //ACA IRÍA LA PAGINA PRINCIPAL DE BESTNID.
		}
		else
			echo "El email ya se encuentra registrado.";
	}
}