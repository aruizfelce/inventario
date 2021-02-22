<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disciplinas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("disciplinas_model");
	}
	
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('admin/disciplinas');
		$this->load->view('layouts/footer');
	}

	public function insertar(){
		$disciplinaCodigo = $this->input->post('disciplinaCodigo');
		$disciplinaDescripcion = $this->input->post('disciplinaDescripcion');
		
		if (isset($disciplinaCodigo) && isset($disciplinaDescripcion)){
			$this->disciplinas_model->insertar($disciplinaCodigo,$disciplinaDescripcion);
			$res="Registro Insertado";
		}else{
			$res="Faltan datos";
		}
		echo json_encode(array("value"=>$res));
	}

	public function eliminar(){
		$id = $this->input->post('idDisciplina');
		if (isset($id)){
			$this->disciplinas_model->eliminar($id);
			$res="Registro eliminado";
		}else{
			$res = "No existe el id";
		}
		echo json_encode(array("value"=>$res));
	}

	public function actualizar(){
		$idDisciplina = $this->input->post('idDisciplina');
		$disciplinaCodigo = $this->input->post('disciplinaCodigo');
		$disciplinaDescripcion = $this->input->post('disciplinaDescripcion');
		
		if (isset($idDisciplina) && isset($disciplinaCodigo) && isset($disciplinaDescripcion)){
			$this->disciplinas_model->actualizar($idDisciplina,$disciplinaCodigo,$disciplinaDescripcion);
			$res="Registro Actualizado";
		}else{
			$res="Faltan datos";
		}
		echo json_encode(array("value"=>$res));
	}

	public function disciplinas(){
		echo json_encode($this->disciplinas_model->disciplinas());
		
	}

}
