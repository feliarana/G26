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

	function obtenerSubastasCategoria($idCategoria) {
		$this->db->from('categoria');
		$this->db->join('subasta', 'subasta.idCategoria = categoria.idCategoria');
		$this->db->where('subasta.idCategoria', $idCategoria);
		$query = $this->db->get();
		if($query->num_rows > 0) {
			return ($query);
		}
		else {
			return (false);
		}
	}

}

?>