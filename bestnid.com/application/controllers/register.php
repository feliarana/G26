<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('user_model');
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
		$query = $this->user_model->verificar_email($datos['email']);  // me guardo la query para tener los datos del usuario a almacenar
		$usuario = $query->result(); //result() devuelve todas las tuplas de la consulta relizada
		
		if ($query){ //Si devuelve algo, se registra al usuario , se crea la sesion y se carga la vista correspondiente.
			$this->user_model->agregar_usuario($usuario);
			$user = array('email'=> $usuario[0]->email,
				'nombre' => $usuario[0]->nombre,
				'apellido'=> $usuario[0]->apellido,
				'id'=> $usuario[0]->idUsuario,
				'login'=> true);
			$this->session->set_userdata($user);
			$this->load->view('index_view'); //ACÁ IRÍA LA PAGINA PRINCIPAL DE BESTNID.
		}
		else
			echo "El email ya se encuentra registrado.";
	}
}