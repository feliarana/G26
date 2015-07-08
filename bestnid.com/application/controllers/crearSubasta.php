<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CrearSubasta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->model('crear_subasta_model');
    }

    function index() {
        $this->load->view('crear_subasta_view');
    }

    function recibirDatos() {
    	$formato = '%Y-%m-%d';
    	$fechaActual = mdate($formato);
    	$cantDias = $this->input->post('cantDias');
    	$nuevafecha = strtotime ('+'.$cantDias.' day', strtotime($fechaActual));
    	$fechaFin = date('Y-m-d', $nuevafecha);
    	echo $fechaFin.' ';

    	$subasta = array(
		'nombreSubasta' => $this->input->post('nombreSubasta'),
		'descripcion' => $this->input->post('descripcion'),
		'idUsuario' => $this->session->userdata('idUsuario'),
		'idCategoria' => $this->input->post('categoria'),
		'fechaInicio' => $fechaActual,
		'fechaFin' => $fechaFin,
		'nombreImagen' => $this->input->post('userfile')
		);
    	echo $subasta['nombreImagen'].' ';
    	// Hasta aca va bien, menos con el nombre de la imagen que no lo toma

    	$nombreImagen = date('dmYHis').'.jpg';
		$config['upload_path'] = FCPATH.'images';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= 10*1024;
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';
		$config['file_name']  = $nombreImagen;
		
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
			return ($error);
		}
		else {
			// Esto es para que dos imagenes cargadas no tengan el mismo nombre
			$subasta['nombreImagen'] = $nombreImagen;
			$this->crear_subasta_model->crearSubasta($subasta);
    		redirect(base_url(index_page().'/index'));
		}
	}

}

?>