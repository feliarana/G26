<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Categorias extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('categorias_model');
	}

	function index() {
		$datos['categorias'] = $this->categorias_model->obtenerCategorias();
		if($datos['categorias']) {
			$this->load->view('categorias_view', $datos);
		}
		else {
			echo 'No hay categorias disponibles';
		}
	}

	function listado() {
		$idCategoria = $this->input->get('id');
		$datos['subastas'] = $this->categorias_model->obtenerSubastasCategoria($idCategoria);
		if($datos['subastas']) {
			$this->load->view('listado_categoria_view', $datos);	
		}
		else {
			echo 'No hay subastas disponibles para esta categoria';
		}
	}

}

?>