<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('session');
		$this->load->model('administrador_model');
	}

	function index() {
		$this->load->view('administrador_view');
	}

	function consultar_usuarios() {

	}

	function consultar_subastas() {

	}

	function crear_categoria() {
		$datos['opcion'] = 'crear_categoria';
		$this->load->view('administrador_view', $datos);
	}

	function insertarDatosCategoria() {
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
			$this->administrador_model->crearCategoria($datos);
    		redirect(base_url(index_page().'/administrador'));
		}
		else {
			$error = array('error' => $this->upload->display_errors());
			return ($error);
		}
	}

	function eliminar_categoria() {
		$datos['opcion'] = 'eliminar_categoria';
		$this->load->view('administrador_view', $datos);
	}

}

?>