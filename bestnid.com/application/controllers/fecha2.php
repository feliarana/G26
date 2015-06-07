<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Fecha2 extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('date');
	}

	function index() {
		
		//$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
		//echo mdate($datestring);
		$datestring = "%Y-%m-%d";
		echo mdate($datestring);
	}
}

?>