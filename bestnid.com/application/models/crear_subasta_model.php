<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Crear_subasta_model extends CI_Model {

		function __construct() {
			parent::__construct();
			$this->load->database();
		}


		function crearSubasta($subasta){
			$this->db->insert('subasta', $subasta);
		}


	}
?>