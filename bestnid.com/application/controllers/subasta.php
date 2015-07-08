<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Subasta extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('subasta_model');
	}

	function index() {
		$idSubasta = $this->input->get('idSubasta');
		$datos['subasta'] = $this->subasta_model->obtenerSubastaPorId($idSubasta);
		$datos['comentarios'] = $this->subasta_model->obtenerComentarios($idSubasta);
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
		redirect(base_url(index_page().'/subasta?idSubasta='.$datos['idSubasta']));
	}

	function comentario() {
		$datos = array(
			'texto' => $this->input->post('comentario'),
			'idUsuario' => $this->session->userdata['idUsuario'],
			'idSubasta' => $this->input->get('idSubasta'),
			'fecha' => mdate('%Y-%m-%d'),
			'hora' => time()
			);
		$this->subasta_model->agregarComentario($datos);
		redirect(base_url(index_page().'/subasta?idSubasta='.$datos['idSubasta']));
	}

	function respuesta() {
		$datos['idSubasta'] = $this->input->get('idSubasta');
		$datos['idComentario'] = $this->input->get('idComentario');
		$datos['respuesta'] = $this->input->post('respuesta'.$datos['idComentario']);
		$this->subasta_model->agregarRespuesta($datos['respuesta'], $datos['idComentario']); 
		redirect(base_url(index_page().'/subasta?idSubasta='.$datos['idSubasta']));
	}

}

?>