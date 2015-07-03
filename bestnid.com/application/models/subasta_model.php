<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subasta_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function obtenerSubastaPorId($idSubasta) {
		$this->db->where('idSubasta', $idSubasta);
		$query = $this->db->get('subasta');
		if($query->num_rows() > 0) {
			return ($query->result());
		}
		else {
			return (false);
		}
	}

	function obtenerComentarios($idSubasta)  {
		$this->db->from('comentario');
		$this->db->join('subasta', 'subasta.idSubasta = comentario.idSubasta');
		$this->db->where('subasta.idSubasta', $idSubasta);
		$query = $this->db->get();
		if($query->num_rows > 0) {
			return ($query);
		}
		else {
			return (false);
		}
	}

	function agregarOferta($datos) {
		$this->db->insert('oferta', $datos);
	}
	
	function agregarComentario($datos) {
		$this->db->insert('comentario', $datos); 
	}

	function agregarRespuesta($respuesta, $idComentario) {
		$this->db->where('idComentario', $idComentario);
		$this->db->update('comentario', array('respuesta' => $respuesta)); 
	}

}

?>