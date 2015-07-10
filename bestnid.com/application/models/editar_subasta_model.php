<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Editar_subasta_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function editarSubasta($subasta) {
		$this->db->where('idSubasta', $subasta['idSubasta']);
		$this->db->where('idUsuario', $subasta['idUsuario']);
		$this->db->update('subasta', $subasta);
	}
}
	
?>