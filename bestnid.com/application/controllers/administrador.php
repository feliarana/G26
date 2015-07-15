<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('session');
		$this->load->model('categorias_model');
		$this->load->model('administrador_model');
	}

	function index() {
		$this->load->view('administrador_view');
	}

	function consultar_usuarios() {
		$datos['opcion'] = 'consultar_usuarios';
		$datos['fechaActual'] = mdate('%Y-%m-%d');
		$this->load->view('administrador_view', $datos);
	}

	function usuarios_registrados() {
		$datos['fecha1'] = $this->input->post('fecha1');
		$datos['fecha2'] = $this->input->post('fecha2');
		if($datos['fecha1'] <= $datos['fecha2']) {
			$datos['opcion'] = 'usuarios_registrados';
			$datos['usuariosRegistrados'] = $this->administrador_model->obtenerUsuariosRegistrados($datos['fecha1'], $datos['fecha2']);
			$this->load->view('administrador_view', $datos);
		}
		else {
			$datos['opcion'] = 'consultar_usuarios';
			$datos['fechaActual'] = mdate('%Y-%m-%d');
			$datos['error'] = 'Los datos ingresados son incorrectos. La primera fecha debe ser menor o igual a la segunda';
			$this->load->view('administrador_view', $datos);
		}
	}

	function consultar_subastas() {

	}

	function subastas_vendidas() {

	}

	function crear_categoria() {
		$datos['opcion'] = 'crear_categoria';
		$this->load->view('administrador_view', $datos);
	}

	function agregarCategoria() {
		$datos['nombreCategoria'] = $this->input->post('nombreCategoria');
		$datos['nombreImagen'] = date('dmYHis').'.jpg';
		$config['upload_path'] = FCPATH.'images';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= 10*1024;
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';
		$config['file_name']  = $datos['nombreImagen'];
		$this->load->library('upload', $config);
		if($this->upload->do_upload()) {
			$this->administrador_model->agregarCategoria($datos);
    		redirect(base_url(index_page().'/administrador'));
		}
		else {
			$error = array('error' => $this->upload->display_errors());
			return ($error);
		}
	}

	function eliminar_categoria() {
		$datos['opcion'] = 'eliminar_categoria';
		$datos['categorias'] = $this->categorias_model->obtenerCategorias();
		if($datos['categorias']) {
			$this->load->view('administrador_view', $datos);
		}
	}

	function eliminarDatosCategoria() {
		$idCategoria = $this->input->get('idCategoria');
		$this->administrador_model->eliminarCategoria($idCategoria);
		redirect(base_url(index_page().'/administrador'));
	}

}

?>