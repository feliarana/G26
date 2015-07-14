<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrador_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function crearCategoria($categoria) {
		$this->db->insert('categoria', $categoria);
	}

	function eliminarCategoria($idCategoria) {
		$this->db->where('idCategoria', $idCategoria);
		$this->db->update('categoria', array('eliminada' => true));
	}

}

?>