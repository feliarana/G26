<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('session');

    }

    function index() { 
        $this->load->view('perfil_view');

    }

}

?>