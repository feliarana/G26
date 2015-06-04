<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->model('user_model');
		$this->load->model('login_model');
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	//LOGIN DESDE ACA
	function index() {
		$this->load->view('user_view/login_view');
	}

	function recibirDatos() {
		// Obtengo los datos ingresados en los inputs mediante el metodo post
		$datos = array('email' => $this->input->post('email'),
			'password' => $this->input->post('password'));
		/* Se realiza un llamado a una funcion del model para obtener la consulta,
		solo con el email es suficiente para conseguir los datos del usuario ya que
		este campo es unico y no puede repetirse */
		$query = $this->login_model->buscarUsuario($datos['email']); // La consulta retorna un objeto de tipo query lo cual tiene sus propias funciones o metodos
		if($query) {
			/* Obtengo la tupla correspondiente al email del usuario en cuestion (como el email no puede repetirse, la consulta solo retorna una sola tupla) */
			$usuario = $query->result(); // result() es una funcion del objeto query que devuelve un arreglo de tuplas (en este caso devuelve una sola tupla)
			if($usuario[0]->password == $datos['password']) { // $usuario[0] accede a la primera tupla del arreglo y ->password accede al valor que se encuentra en el campo password
				$user = array('email' => $usuario[0]->email,
					'nombre' => $usuario[0]->nombre,
					'apellido' => $usuario[0]->apellido,
					'id' => $usuario[0]->idUsuario,
					'login' => true);
				$this->session->set_userdata($user);
				$this->load->view('index_view');
			}
			else
				echo 'La contraseña es incorrecta';
		}
		else
			echo 'El email es incorrecto';
	}


	//LOGIN HASTA ACA

	//REGISTRO DESDE ACA HACIA ABAJO
	function registro (){
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
		if ($query){ //Si devuelve nada, se registra al usuario , se crea la sesion y se carga la vista correspondiente.
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