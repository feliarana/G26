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

	function agregarOferta($oferta) {
		$this->db->insert('oferta', $oferta);
	}

	function modificarOferta($oferta) {
		$this->db->where('idUsuario', $oferta['idUsuario']);
		$this->db->where('idSubasta', $oferta['idSubasta']);
		$this->db->update('oferta', array('argumento' => $oferta['argumento'], 'monto' => $oferta['monto']));
	}

	function obtenerOfertaDelUsuario($idUsuario, $idSubasta) {
		$this->db->where('idUsuario', $idUsuario);
		$this->db->where('idSubasta', $idSubasta);
		$query = $this->db->get('oferta');
	}

	function obtenerNombreCategoriaPorId($idSubasta) {
		$this->db->from('categoria');
		$this->db->join('subasta', 'subasta.idCategoria = categoria.idCategoria');
		$this->db->where('subasta.idSubasta', $idSubasta);
		$query = $this->db->get();		
		if($query->num_rows() > 0) {
			return ($query->result());
		}
		else {
			return (false);
		}
	}
	
	function agregarComentario($datos) {
		$this->db->insert('comentario', $datos); 
	}

	function agregarRespuesta($respuesta, $idComentario) {
		$this->db->where('idComentario', $idComentario);
		$this->db->update('comentario', array('respuesta' => $respuesta)); 
	}

	function obtenerComentarios($idSubasta) {
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

	function eliminarSubasta($idSubasta) {
		$this->db->where('idSubasta', $idSubasta);
		$this->db->delete('subasta');
	}

	function obtenerOfertas($idSubasta) {
		$this->db->from('subasta');
		$this->db->join('oferta', 'subasta.idSubasta = oferta.idSubasta');
		$this->db->where('subasta.idSubasta', $idSubasta);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return ($query->result());
		}
		else {
			return (false);
		}
	}

}

?>