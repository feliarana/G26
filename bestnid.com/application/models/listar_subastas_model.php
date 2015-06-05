<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Listar_subastas_model extends CI_Model {
	
	function __construct() {
		parent::__construct(); 
		$this->load->database(); // Carga la BD
	}

	function obtenerSubastas() {
		$this->db->order_by("fechaFin", "asc"); // Ordena las subastas de forma ascendente (por fecha de vencimiento, de las que estas mas proximas a vencer a las que estan mas lejanas a vencer)
		$query = $this->db->get('subasta'); // En $query almacena el resultado de la consulta
		if($query->num_rows() > 0) // Comprueba que no esté vacía
			return ($query); 
		else 
			return (false);
	}
}

?>