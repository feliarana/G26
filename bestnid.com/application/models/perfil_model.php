<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function obtenerSubastasVigentes($idUsuario) {
		$formato = "%Y-%m-%d";
		$fechaActual = mdate($formato); // mdate retorna la fecha actual con el formato especificado
		$this->db->where('idUsuario', $idUsuario);
		$this->db->where('fechaFin >', $fechaActual);
		$this->db->order_by('fechaFin', 'asc'); // Ordena las subastas de forma ascendente (por fecha de vencimiento, de las que estas mas proximas a vencer a las que estan mas lejanas a vencer)
		$query = $this->db->get('subasta'); // En $query almacena el resultado de la consulta
		if($query->num_rows() > 0)
			return ($query);
		else 
			return (false);
	}

	function obtenerSubastasFinalizadas($idUsuario) {
		$formato = "%Y-%m-%d";
		$fechaActual = mdate($formato); // mdate retorna la fecha actual con el formato especificado
		$this->db->from('subasta');
		$this->db->join('oferta', 'subasta.idSubasta = oferta.idSubasta');
		$this->db->where('subasta.idUsuario', $idUsuario);
		$this->db->where('fechaFin <=', $fechaActual);
		$this->db->order_by('fechaFin', 'asc'); // Ordena las subastas de forma ascendente (por fecha de vencimiento, de las que estas mas proximas a vencer a las que estan mas lejanas a vencer)
		$this->db->group_by('subasta.idSubasta'); 
		$query = $this->db->get(); // En $query almacena el resultado de la consulta
		if($query->num_rows() > 0)
			return ($query);
		else 
			return (false);
	}

	function obtenerSubastasOfertadas($idUsuario) {
		$formato = "%Y-%m-%d";
		$fechaActual = mdate($formato);
		$this->db->from('subasta');
		$this->db->join('oferta', 'subasta.idSubasta = oferta.idSubasta');
		$this->db->where('oferta.idUsuario', $idUsuario);
		$this->db->where('subasta.fechaFin >', $fechaActual);
		$this->db->order_by('subasta.fechaFin', 'asc');
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return ($query);
		else
			return (false);
	}

	function obtenerOfertas($idSubasta) { // Es para el Elegir Ganador
		$this->db->from('oferta');
		$this->db->where('oferta.idSubasta', $idSubasta);
		$query = $this->db->get(); // En $query almacena el resultado de la consulta
		if($query->num_rows() > 0)
			return ($query);
		else 
			return (false);
	}

	function obtenerMisOfertas($idUsuario) { 	//Va a mostrar las ofertas del usuario que no hayan sido vencidas.
		$formato = "%Y-%m-%d";
		$fechaActual = mdate($formato);
		$this->db->from('oferta');
		$this->db->join('subasta', 'subasta.idSubasta = oferta.idSubasta');
		$this->db->where('oferta.idUsuario', $idUsuario);
		$this->db->where('subasta.fechaFin >', $fechaActual);
		$query = $this->db->get(); // En $query almacena el resultado de la consulta
		if($query->num_rows() > 0)
			return ($query);
		else 
			return (false);
	}

	function desactivarCuenta($idUsuario) {
		$this->db->where('idUsuario', $idUsuario);
		$this->db->update('usuario', array('activo' => false));
	}

}

?>