<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Elegir_ganador extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->model('perfil_model');
    }

    function index() { 
        $idSubasta = $this->input->get('idSubasta');
        $datos['oferta'] = $this->perfil_model->obtenerOfertas($idSubasta);
        $this->load->view('elegir_ganador_view', $datos);
    }


}

?>