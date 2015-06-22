<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Subasta extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('subasta_model');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('subasta_model');

	}

	function index() {
			$idSubasta = $this->input->get('id');
			$datos['subasta'] = $this->subasta_model->obtenerSubastaPorId($idSubasta);
			$datos['comentarios'] = $this->subasta_model->obtenerComentarios();
			$this->load->view('subasta_view', $datos);
	}

	
	function oferta() {
		$datos = array(
			'argumento' => $this->input->post('argumento'),
			'monto' => $this->input->post('monto'),
			'idUsuario' => $this->session->userdata('idUsuario'),
			'idSubasta' => $this->input->get('idSubasta')
		);
		$this->subasta_model->agregarOferta($datos);
		echo 'Oferta enviada con exito';
	}

	function pregunta() {
		$pregunta = array( 'texto'=> $this->input->post('pregunta'),
			'idSubasta'=> $this->input->get('idSubasta'),
			'idUsuario'=> $this->session->userdata['idUsuario'],
			'fecha' => date('Y-m-d'),
			'hora' => time()
			);
		$this->subasta_model->agregarPregunta($pregunta); 
		redirect(base_url(index_page().'/subasta?id='.$pregunta['idSubasta']));
	}

}

?>