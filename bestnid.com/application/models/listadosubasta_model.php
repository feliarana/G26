<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Listadosubasta_model extends CI_Model {
	function __construct() {
		parent::__construct(); 
		$this->load->database(); // Carga la BD
	}

	function obtenerSubastas() {
		$query = $this->db->get('subasta'); //En $query almaceno la tabla "subasta"
		if($query->num_rows() > 0) //Compruebo que no esté vacía
			return $query; 
		else 
			return false;
	}
}

?>