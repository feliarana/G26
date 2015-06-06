<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database(); // Se carga la base de datos configurada en el archivo config/database.php
	}

	function verificarDatos($email, $DNI) {
		$this->db->where('email', $email);
		$this->db->or_where('DNI', $DNI);
		$query = $this->db->get('usuario');
		if($query->num_rows == 0) // Si obtiene algun resultado significa que el email ya existe en la BD
			return (true);
		else
			return (false);
	}

	function agregarUsuario($usuario) {
		$this->db->insert('usuario', $usuario); 
	}

	function obtenerIdUsuario($email) {
		$this->db->where('email', $email);
		$query = $this->db->get('usuario');
		return ($query->result()[0]->idUsuario); // Devuelve el id del usuario
	}
}

?>