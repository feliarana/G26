<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class perfil_subastas_publicadas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->model('perfil/perfil_subastas_publicadas_model');

    }

    function index() { 
        $idUsuario= $this->session->userdata('idUsuario');
        $subastas= $this->perfil_subastas_publicadas_model->misSubastas($idUsuario);
        $datos = array(
        'subastas' => $subastas);
        $this->load->view('perfil/perfil_subastas_publicadas_view', $datos);

    }

}

?>