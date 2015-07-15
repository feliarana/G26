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
        $datos['subastasPublicadas'] = $this->perfil_model->obtenerSubastasVigentes($idUsuario); // Retorna las subastas publicadas vigentes del usuario actualmente logueado
        $datos['subastasOfertadas'] =  $this->perfil_model->obtenerSubastasOfertadas($idUsuario); // Retorna las subastas vigentes con la oferta correspondiente del usuario actualmente logueado
        $this->load->view('perfil_view', $datos);
    }

    function informacion() { 
        $this->load->view('perfil/perfil_informacion_view');
    }

    function subastasVigentes() { 
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['subastas'] = $this->perfil_model->obtenerSubastasVigentes($idUsuario);
        $this->load->view('perfil/perfil_subastas_publicadas_view', $datos);
    }

    function subastasFinalizadas() { //Este es para el elegir ganador
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['subastas'] = $this->perfil_model->obtenerSubastasFinalizadas($idUsuario);
        $this->load->view('perfil/perfil_subastas_finalizadas_view', $datos);
    }

    function misOfertas() { 
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['ofertas'] = $this->perfil_model->obtenerMisOfertas($idUsuario);
        $this->load->view('perfil/mis_ofertas_view', $datos);
    }

    function obtenerOfertas($idSubasta) { // Este es para el elegir ganador
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['subastas'] = $this->perfil_model->obtenerSubastasFinalizadas($idUsuario);
        $this->load->view('perfil/perfil_subastas_finalizadas_view', $datos);
    }

    function desactivarCuenta() {
        $idUsuario = $this->session->userdata('idUsuario');
        $this->perfil_model->desactivarCuenta($idUsuario);
        redirect(base_url(index_page().'/logout'));
    }

}

?>