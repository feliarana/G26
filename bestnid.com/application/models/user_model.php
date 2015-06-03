<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	function __construct(){
		parent::__construct(); //Seria como el super new.
		$this->load->database(); //Se carga la base de datos configurada en el archivo config/database.php
	}

	function verificar_email($email){
		$this->db->where('email',$email); //Query de la BD de mysql (primero el where y despues el from)
		$query = $this->db->get('usuario');
		if($query->num_rows > 0)	//Si existe el usuario, devuelve false.
			return false;
		else
			return true;
	}

	function agregar_usuario($usuario){
		$this->db->insert('usuario', $usuario); 
  		# INSERT INTO `posts` (title,author_id) VALUES('My first blog post!!', 5)

	}
}