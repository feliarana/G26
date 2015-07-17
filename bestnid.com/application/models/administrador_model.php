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

	function obtenerSubastasVendidas($fecha1, $fecha2) { // Devuelve las subastas vendidas con su respectivo subastador
		$this->db->from('subasta');
		$this->db->join('usuario', 'subasta.idUsuario = usuario.idUsuario');
		$this->db->where('fechaFin >=', $fecha1);
		$this->db->where('fechaFin <=', $fecha2);
		$this->db->where('ganador <>', 'NULL');
		$this->db->where('pagada', true);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return ($query->result());
		}
		else {
			return (false);
		}
	}

	function obtenerOfertasGanadoras($fecha1, $fecha2) { // Devuelve las subastas vendidas con su respectiva oferta y ganador
		$this->db->from('subasta');
		$this->db->join('oferta', 'subasta.idSubasta = oferta.idSubasta');
		$this->db->join('usuario', 'subasta.ganador = usuario.idUsuario');
		$this->db->where('fechaFin >=', $fecha1);
		$this->db->where('fechaFin <=', $fecha2);
		$this->db->where('ganador <>', 'NULL');
		$this->db->where('pagada', true);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return ($query->result());
		}
		else {
			return (false);
		}
	}

	function agregarCategoria($categoria) {
		$this->db->insert('categoria', $categoria);
	}

	function obtenerCategoriaPorNombre($categoria) {
		//Consulta para que no se repitan los nombres de las categorias
		$this->db->from('categoria');
		$this->db->where('nombreCategoria', $categoria['nombreCategoria']);
		$query = $this->db->get();

		if($query->num_rows() == 0) {
			return (true);
		}
		else {
			return (false);
		}
	}

	function eliminarCategoria($idCategoria) {
		$this->db->where('idCategoria', $idCategoria);
		$this->db->update('categoria', array('eliminada' => true));
	}

}

?>