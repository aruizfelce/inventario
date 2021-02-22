<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subgrupos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("subgrupos_model");
	}
	
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('admin/subgrupos');
		$this->load->view('layouts/footer');
	}

	public function insertar(){
		$subgrupoCodigo = $this->input->post('subgrupoCodigo');
		$subgrupoDescripcion = $this->input->post('subgrupoDescripcion');
		$grupo = $this->input->post('grupo');
		
		if (isset($subgrupoCodigo) && isset($subgrupoDescripcion)){
			$this->subgrupos_model->insertar($subgrupoCodigo,$subgrupoDescripcion,$grupo);
			$res="Registro Insertado";
		}else{
			$res="Faltan datos";
		}
		echo json_encode(array("value"=>$res));
	}

	public function eliminar(){
		$id = $this->input->post('idSubgrupo');
		if (isset($id)){
			$this->subgrupos_model->eliminar($id);
			$res="Registro eliminado";
		}else{
			$res = "No existe el id";
		}
		echo json_encode(array("value"=>$res));
	}

	public function actualizar(){
		$idsubgrupo = $this->input->post('idSubgrupo');
		$subgrupoCodigo = $this->input->post('subgrupoCodigo');
		$subgrupoDescripcion = $this->input->post('subgrupoDescripcion');

		if (isset($idsubgrupo) && isset($subgrupoCodigo) && isset($subgrupoDescripcion)){
			$this->subgrupos_model->actualizar($idsubgrupo,$subgrupoCodigo,$subgrupoDescripcion);
			$res="Registro Actualizado";
		}else{
			$res="Faltan datos";
		}
		echo json_encode(array("value"=>$res));
	}

	public function grupo($d){
		$grupo = $d;
		$this->load->view('layouts/header');
		$this->load->view('admin/subgrupos');
		$this->load->view('layouts/footer');
		//echo json_encode($this->subgrupos_model->subgrupos($subgrupo));
		
	}

	public function subgrupos(){
		$grupo = $this->input->post('grupo');
		echo json_encode($this->subgrupos_model->subgrupos($grupo));
	}

	public function buscargrupo(){
		$grupo = $this->input->post('grupo');
		echo json_encode($this->subgrupos_model->buscargrupo($grupo));
		
	}


}
