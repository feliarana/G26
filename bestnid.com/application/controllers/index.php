<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('listar_subastas_model');
	}

	function index() {
		$datos['subastas'] = $this->listar_subastas_model->obtenerSubastas(); // En $datos['subastas'] se guarda el resultado de la consulta que genera obtenerSubastas()
		$this->load->view('index_view', $datos);
	}
}

?>