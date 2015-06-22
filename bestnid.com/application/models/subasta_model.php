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

	function obtenerComentarios()  {
		$this->db->from('comentario');
		$this->db->join('subasta', 'subasta.idSubasta = comentario.idSubasta');
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
	

	function agregarPregunta($pregunta)  {
		$this->db->insert('comentario', $pregunta); 
	}	


	function agregarRespuesta($respuesta)  {
		
	}	


}

?>