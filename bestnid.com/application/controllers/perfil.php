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
        $datos['subastasPublicadas'] = $this->perfil_model->verificarSubastasPublicadas($idUsuario); // Retorna las subastas publicadas vigentes del usuario actualmente logueado
        $datos['subastasOfertadas'] =  $this->perfil_model->verificarSubastasOfertadas($idUsuario); // Retorna las subastas vigentes con la oferta correspondiente del usuario actualmente logueado
        $this->session->set_userdata($datos);
        $this->load->view('perfil_view', $datos);
    }

    function informacion() {
        $datos['opcion'] = 'informacion_personal';
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['usuario'] = $this->perfil_model->obtenerUsuario($idUsuario);
        $this->load->view('perfil_view', $datos);
    }

    function subastas_vigentes() {
        $datos['opcion'] = 'subastas_vigentes';
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['subastasVigentes'] = $this->perfil_model->obtenerSubastasVigentes($idUsuario); // Retorna las subastas publicadas vigentes del usuario actualmente logueado
        $this->load->view('perfil_view', $datos);
    }

    function subastas_finalizadas() {
        $datos['opcion'] = 'subastas_finalizadas';
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['subastasFinalizadas'] = $this->perfil_model->obtenerSubastasFinalizadas($idUsuario);
        $this->load->view('perfil_view', $datos);
    }

    function elegir_ganador() {
        $datos['opcion'] = 'elegir_ganador';
        $idSubasta = $this->input->get('idSubasta');
        $datos['ofertas'] = $this->perfil_model->obtenerOfertas($idSubasta);
        $this->load->view('perfil_view', $datos);
    }

    function guardarGanador() {
        $idSubasta = $this->input->get('idSubasta');
        $idUsuario = $this->input->get('idUsuario');
        $this->perfil_model->guardarGanador($idSubasta, $idUsuario);
        redirect(base_url(index_page().'/perfil'));
    }

    function ofertas_pendientes() {
        $datos['opcion'] = 'ofertas_pendientes';
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['ofertasPendientes'] = $this->perfil_model->obtenerOfertasPendientes($idUsuario);
        $this->load->view('perfil_view', $datos);
    }

    function ofertas_ganadas() {
        $datos['opcion'] = 'ofertas_ganadas';
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['ofertasGanadas'] = $this->perfil_model->obtenerOfertasGanadas($idUsuario);
        $this->load->view('perfil_view', $datos);
    }

    function ofertas_perdidas() {
        $datos['opcion'] = 'ofertas_perdidas';
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['ofertasPerdidas'] = $this->perfil_model->obtenerOfertasPerdidas($idUsuario);
        $this->load->view('perfil_view', $datos);
    }

    function desactivarCuenta() {
        $idUsuario = $this->session->userdata('idUsuario');
        $this->perfil_model->desactivarCuenta($idUsuario);
        redirect(base_url(index_page().'/logout'));
    }

    // Dehhhhh

    function verificar_tarjeta() {

        $idSubasta= $this->input->get('idSubasta'); //Se recibe la subasta para saber que subasta esta pagando el usuario.
        //TODO

        $idUsuario = $this->session->userdata('idUsuario');
        $datos['ofertas'] = $this->perfil_model->obtenerMisOfertas($idUsuario);
        $this->load->view('perfil/mis_ofertas_view', $datos); //Una vez realizado el pago, vuelve a las ofertas del usuario.
    }

    function modificarDatosPersonales() {
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['query'] = $this->perfil_model->datosUsuario($idUsuario); //Esto devuelve una query
        $this->load->view('perfil/modificar_informacion_view', $datos);
    }

    function verificar_datos() {
        $datos = array(
            'idUsuario' => $idUsuario = $this->session->userdata('idUsuario'),
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'password' => $this->input->post('password'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono'),
            'fechaRegistro' => mdate('%Y-%m-%d')
            );
        $pass2 = $this->input->post('password2');
        $passCoincide = ($datos['password'] == $pass2);
        if($passCoincide) { // Si devuelve true, se registra el usuario, se crea la sesion y se carga la vista correspondiente      
            $this->perfil_model->modificarUsuario($datos);
            $this->session->sess_destroy();
            redirect(base_url(index_page().'/index'));
        }
        else {
            if(!$passCoincide) {
                $error['datos_error'] = 'Las contraseñas no coinciden';
                $this->load->view('/perfil/modificarDatosPersonales', $error);
            }
        }
    }

}

?>