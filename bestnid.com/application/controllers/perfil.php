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
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['query'] = $this->perfil_model->datosUsuario($idUsuario);
        $this->load->view('perfil/perfil_informacion_view', $datos);
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


    function obtenerOfertas($idSubasta) { //Este es para el elegir ganador
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['subastas'] = $this->perfil_model->obtenerSubastasFinalizadas($idUsuario);
        $this->load->view('perfil/perfil_subastas_finalizadas_view', $datos);
    }

    function misOfertas() { 
        $idUsuario = $this->session->userdata('idUsuario');
        $datos['ofertas'] = $this->perfil_model->obtenerMisOfertas($idUsuario);
        $this->load->view('perfil/mis_ofertas_view', $datos);
    }

    function elegirGanador() { 
        $idUsuario= $this->input->get('idUsuario');
        $idSubasta= $this->input->get('idSubasta'); 
        $this->perfil_model->elegirGanador($idSubasta, $idUsuario);
        $this->subastasFinalizadas();
    }

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
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'password' => $this->input->post('password'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono'),
            'fechaRegistro' => mdate('%Y-%m-%d'),
            'userAdmin' => false,
            'activo' => true
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

    function desactivarCuenta() {
        $idUsuario = $this->session->userdata('idUsuario');
        $this->perfil_model->desactivarCuenta($idUsuario);
        redirect(base_url(index_page().'/logout'));
    }

}

?>