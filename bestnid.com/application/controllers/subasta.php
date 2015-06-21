<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Subasta extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('subasta_model');
	}

	function index() {
			$idSubasta = $this->input->get('id');
			$datos['subasta'] = $this->subasta_model->obtenerSubastaPorId($idSubasta);
			$this->load->view('subasta_view', $datos);
	}



}

?>