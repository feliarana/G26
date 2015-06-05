<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('listadosubasta_model');
	}

	function index() {
		$data['subastas'] = $this->listadosubasta_model->obtenerSubastas(); //En $data me guardo el resultado de la funcion obtenerSubastas()
		if($data['subastas'])
			$this->load->view('index_view', $data);
		else
			echo 'No hay subastas disponibles';
	}
}

?>