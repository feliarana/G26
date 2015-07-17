<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crear_subasta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->model('categorias_model');
        $this->load->model('subasta_model');
        $this->load->library('javascript');
    }

    function index() {
    	$datos['categorias'] = $this->categorias_model->obtenerCategorias();
        $this->load->view('crear_subasta_view', $datos);
    }

    function agregarSubasta() {
    	$formato = '%Y-%m-%d';
    	$fechaActual = mdate($formato);
    	$cantDias = $this->input->post('cantDias');
    	$nuevafecha = strtotime ('+'.$cantDias.' day', strtotime($fechaActual));
    	$fechaFin = date('Y-m-d', $nuevafecha);
    	$datos = array(
			'nombreSubasta' => $this->input->post('nombreSubasta'),
			'descripcion' => $this->input->post('descripcion'),
			'idUsuario' => $this->session->userdata('idUsuario'),
			'idCategoria' => $this->input->post('categoria'),
			'fechaInicio' => $fechaActual,
			'fechaFin' => $fechaFin,
			'nombreImagen' => $this->input->post('userfile')
			);
    	$nombreImagen = date('dmYHis').'.jpg';
		$config['upload_path'] = FCPATH.'images';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= 10*1024;
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';
		$config['file_name']  = $nombreImagen;
		
		$this->load->library('upload', $config);

		if($this->upload->do_upload()) {
			$datos['nombreImagen'] = $nombreImagen;
			$this->subasta_model->agregarSubasta($datos);
			print "<script type=\"text/javascript\">alert('Subasta cargada con exito!');</script>"; 
			$this->load->view('perfil_view');
		}
		else {
			print "<script type=\"text/javascript\">alert('Archivo inválido. Por favor, seleccione una imagen.');</script>"; 
			$datos['categorias'] = $this->categorias_model->obtenerCategorias();
			$this->load->view('crear_subasta_view', $datos);

		}
	}



}

?>