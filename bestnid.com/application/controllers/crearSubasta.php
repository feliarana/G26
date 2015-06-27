<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CrearSubasta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->model('crear_subasta_model');
        $this->load->library('session');
    }

    function index() {
        $this->load->view('crear_subasta_view');
    }

    function recibirDatos() {
    	$formato = "%Y-%m-%d";
    	$cantDias = $this->input->post('cantDias');
    	$fechaActual = mdate($formato);
    	$fechaFin = $fechaActual;
    	$fechaFin = date('Y-m-d',strtotime('+'.$cantDias.' days'));

    	$subasta = array(
		'idUsuario' => $this->session->userdata('idUsuario'),
		'nombreSubasta' => $this->input->post('nombreSubasta'),
		'descripcion' => $this->input->post('descripcion'),
		'idCategoria' => $this->input->post('categoria'),
		'fechaInicio' => $fechaActual,
		'fechaFin' => $fechaFin,
		'nombreImagen' => $this->input->post('userfile')
		);

    	//Esto será el nombre final de la imagen. Es para que dos imágenes no posean el mismo nombre
		$horaActual = date('dmYHis').'.jpg';

		$config['upload_path'] = 'C:\xampp\htdocs\bestnid.com\images';
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '5000000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['file_name']  = $horaActual;

		
        $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());			
		}	
		else
		{	
			//Esto es para que dos imagenes cargadas no tengan el mismo nombre
			$subasta['nombreImagen'] = $horaActual;
			$this->crear_subasta_model->crearSubasta($subasta);
			$data = array('upload_data' => $this->upload->data());

			//Una vez cargada, vuelve a la página de inicio
    		redirect(base_url(index_page().'/index'));
		}

		}
	}
?>