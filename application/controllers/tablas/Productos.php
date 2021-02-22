<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("productos_model");
	}
	
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('admin/productos');
		$this->load->view('layouts/footer');
	}

	public function insertar(){
		
		$productoCodigo = $this->input->post('productoCodigo');
		$productoDescripcion = $this->input->post('productoDescripcion');
		$subgrupo = $this->input->post('subgrupo');
		$ubicacion = $this->input->post('ubicacion');
		$precio = $this->input->post('precio');
		$precioMayor = $this->input->post('precioMayor');
		$fechaPrecio = $this->input->post('fechaPrecio');
		$productoFoto = $this->input->post('productoFoto');
		$unidad = $this->input->post('unidad');
		$unidadPieza = $this->input->post('unidadPieza');
		$piezas = $this->input->post('piezas');

	
		if (isset($productoCodigo) && isset($productoDescripcion) && isset($precio) && isset($precioMayor) && isset($fechaPrecio) && isset($unidad) && isset($unidadPieza) && isset($piezas)){
			$this->productos_model->insertar($productoCodigo,$productoDescripcion,$subgrupo,$ubicacion,$precio,$precioMayor,$fechaPrecio,$productoFoto,$unidad,$unidadPieza,$piezas);
			$res="Registro Insertado";
		}else{
			$res="Faltan datos";
		}
		echo json_encode(array("value"=>$res));
	}

	public function eliminar(){
		$id = $this->input->post('id');
		if (isset($id)){
			$this->productos_model->eliminar($id);
			$res="Registro eliminado";
		}else{
			$res = "No existe el id";
		}
		echo json_encode(array("value"=>$res));
	}

	public function actualizar(){
		$idproducto = $this->input->post('idProducto');
		$productoCodigo = $this->input->post('productoCodigo');
		$productoDescripcion = $this->input->post('productoDescripcion');
		$subgrupo = $this->input->post('subgrupo');
		$ubicacion = $this->input->post('ubicacion');
		$precio = $this->input->post('precio');
		$precioMayor = $this->input->post('precioMayor');
		$fechaPrecio = $this->input->post('fechaPrecio');
		$productoFoto = $this->input->post('productoFoto');
		$unidad = $this->input->post('unidad');
		$unidadPieza = $this->input->post('unidadPieza');
		$piezas = $this->input->post('piezas');

		if (isset($idproducto) && isset($productoCodigo) && isset($productoDescripcion) && isset($precio) && isset($precioMayor) && isset($fechaPrecio) && isset($unidad) && isset($unidadPieza) && isset($piezas)){
			$this->productos_model->actualizar($idproducto,$productoCodigo,$productoDescripcion,$unidadPieza,$precio,$precioMayor,$fechaPrecio,$productoFoto,$unidad,$unidadPieza,$piezas);
			$res="Registro Actualizado";
		}else{
			$res="Faltan datos";
		}
		echo json_encode(array("value"=>$res));
	}

	public function subgrupo($d){
		$grupo = $d;
		$this->load->view('layouts/header');
		$this->load->view('admin/productos');
		$this->load->view('layouts/footer');
		//echo json_encode($this->productos_model->productos($producto));
	}

	public function productos(){
		$subgrupo = $this->input->post('subgrupo');
		echo json_encode($this->productos_model->productos($subgrupo));
	}

	public function filtrarproductos(){
		$subgrupo = $this->input->post('subgrupo');
		$producto = $this->input->post('producto');
		echo json_encode($this->productos_model->filtrarproductos($subgrupo,$producto));
	}

	public function buscarsubgrupo(){
		$subgrupo = $this->input->post('subgrupo');
		echo json_encode($this->productos_model->buscarsubgrupo($subgrupo));
	}

	public function contarproductos(){
		$subgrupo = $this->input->post('subgrupo');
		echo $this->productos_model->contarproductos($subgrupo);
	}

	public function subirimagen(){
		header('Access-Control-Allow-Origin: *');  
		$codigo = $this->input->post('codigo');

		if (move_uploaded_file($_FILES["file"]["tmp_name"], "imagenes/".$codigo)) {	
			echo "done";
			exit;
		}
	  
		echo "failed";
	}
}
