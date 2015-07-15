<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrador_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function obtenerUsuariosRegistrados($fecha1, $fecha2) {
		$this->db->where('fechaRegistro >=', $fecha1);
		$this->db->where('fechaRegistro <=', $fecha2);
		$query = $this->db->get('usuario');
		if($query->num_rows() > 0) {
			return ($query);
		}
		else {
			return (false);
		}
	}

	function agregarCategoria($categoria) {
		$this->db->insert('categoria', $categoria);
	}

	function eliminarCategoria($idCategoria) {
		$this->db->where('idCategoria', $idCategoria);
		$this->db->update('categoria', array('eliminada' => true));
	}

}

?>