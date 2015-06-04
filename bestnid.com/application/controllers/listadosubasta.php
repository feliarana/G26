<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Listadosubasta extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('listadosubasta_model');
	}

	function index() {
		$data['subastas'] = $this->listadosubasta_model->obtenerSubastas(); //En %data me guardo el resultado de la funcion obtenerSubastas()
		$this->load->view('listadosubasta_view',$data);
	}
}