<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grupos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("grupos_model");
	}
	
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('admin/grupos');
		$this->load->view('layouts/footer');
	}

	public function insertar(){
		$grupoCodigo = $this->input->post('grupoCodigo');
		$grupoDescripcion = $this->input->post('grupoDescripcion');
		$disciplina = $this->input->post('disciplina');
		
		if (isset($grupoCodigo) && isset($grupoDescripcion)){
			$this->grupos_model->insertar($grupoCodigo,$grupoDescripcion,$disciplina);
			$res="Registro Insertado";
		}else{
			$res="Faltan datos";
		}
		echo json_encode(array("value"=>$res));
	}

	public function eliminar(){
		$id = $this->input->post('idGrupo');
		if (isset($id)){
			$this->grupos_model->eliminar($id);
			$res="Registro eliminado";
		}else{
			$res = "No existe el id";
		}
		echo json_encode(array("value"=>$res));
	}

	public function actualizar(){
		$idgrupo = $this->input->post('idGrupo');
		$grupoCodigo = $this->input->post('grupoCodigo');
		$grupoDescripcion = $this->input->post('grupoDescripcion');

		if (isset($idgrupo) && isset($grupoCodigo) && isset($grupoDescripcion)){
			$this->grupos_model->actualizar($idgrupo,$grupoCodigo,$grupoDescripcion);
			$res="Registro Actualizado";
		}else{
			$res="Faltan datos";
		}
		echo json_encode(array("value"=>$res));
	}

	public function disciplina($d){
		$disciplina = $d;
		$this->load->view('layouts/header');
		$this->load->view('admin/grupos');
		$this->load->view('layouts/footer');
		//echo json_encode($this->grupos_model->grupos($disciplina));
		
	}

	public function grupos(){
		$disciplina = $this->input->post('disciplina');
		echo json_encode($this->grupos_model->grupos($disciplina));
	}

	public function buscardisciplina(){
		$disciplina = $this->input->post('disciplina');
		echo json_encode($this->grupos_model->buscardisciplina($disciplina));
		
	}

}
