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
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['subastasPublicadas'] = $this->perfil_model->obtenerSubastasPublicadas($idUsuario); // Retorna las subastas publicadas vigentes del usuario actualmente logueado
        $datos['subastasOfertadas'] =  $this->perfil_model->obtenerSubastasOfertadas($idUsuario); // Retorna las subastas vigentes con la oferta correspondiente del usuario actualmente logueado
        $this->load->view('perfil_view', $datos);
    }

    function informacion() { 
        $this->load->view('perfil/perfil_informacion_view');
    }

    function subastasPublicadas() { 
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['subastas'] = $this->perfil_model->obtenerSubastasPublicadas($idUsuario);
        $this->load->view('perfil/perfil_subastas_publicadas_view', $datos);
    }

    function ofertasPublicadas() { 
        $this->load->view('perfil/perfil_ofertas_publicadas_view');
    }

    function desactivarCuenta() {
        $idUsuario = $this->session->userdata('idUsuario');
        $this->perfil_model->desactivarCuenta($idUsuario);
        redirect(base_url(index_page().'/logout'));
    }

}

?>