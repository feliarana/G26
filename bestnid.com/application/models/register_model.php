<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {
	
	function __construct() {
		parent::__construct(); // Seria como el super new
		$this->load->database(); // Se carga la base de datos configurada en el archivo config/database.php
	}

	function verificar_datos($email, $DNI) {
		$this->db->where('email', $email); // Query de la BD de mysql (primero el where y despues el from)
		$this->db->or_where('DNI', $DNI);
		$query = $this->db->get('usuario');
		if($query->num_rows > 0) // Si obtiene algun resultado significa que el email ya existe en la BD
			return (false);
		else
			return (true); // Si no retorna nada la consulta, el email es valido y el usuario podra ser registrado en el sistema
	}

	function agregar_usuario($usuario) {
		$this->db->insert('usuario', $usuario); 
	}

	function obtenerIdUsuario($email) {
		$this->db->where('email', $email);
		$query = $this->db->get('usuario');
		return ($query->result()[0]->idUsuario); // Devuelve el id del usuario
	}
}

?>