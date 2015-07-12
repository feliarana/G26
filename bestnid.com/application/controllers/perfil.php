<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->model('perfil_model');
    }

    function index() { 
        $this->load->view('perfil_view');
    }

    function informacion() { 
        $this->load->view('perfil/perfil_informacion_view');
    }

    function subastasPublicadas() { 
        $idUsuario= $this->session->userdata('idUsuario');
        $subastas= $this->perfil_model->misSubastas($idUsuario);
        $datos = array(
        'subastas' => $subastas);
        $this->load->view('perfil/perfil_subastas_publicadas_view', $datos);
    }

    function ofertasPublicadas() { 
        $this->load->view('perfil/perfil_ofertas_publicadas_view');
    }

    function desactivarCuenta() {

    }

}

?>