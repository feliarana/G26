<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->model('login_model');
	}

	function index() {
		$this->load->view('login_view');
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
			if($usuario[0]->password == $datos['password']) // $usuario[0] accede a la primera tupla del arreglo y ->password accede al valor que se encuentra en el campo password
				$this->load->view('index_view');
			else
				echo 'La contraseña es incorrecta';
		}
		else
			echo 'El email es incorrecto';
	}
}

?>