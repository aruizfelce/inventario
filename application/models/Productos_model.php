<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productos_model extends CI_Model{
    public function insertar($productoCodigo,$productoDescripcion,$subgrupo,$ubicacion,$precio,$precioMayor,$fechaPrecio,$productoFoto,$unidad,$unidadPieza,$piezas){
        $datos= array(
            "subgrupo"=>$subgrupo,
            "productoCodigo"=>$productoCodigo,
            "productoDescripcion"=>$productoDescripcion,
            "ubicacion"=>$ubicacion,
            "precio"=>$precio,
            "precioMayor"=>$precioMayor,
            "fechaPrecio"=>$fechaPrecio,
            "productoFoto"=>$productoFoto,
            "unidad"=>$unidad,
            "unidadPieza"=>$unidadPieza,
            "piezas"=>$piezas
        );
        
        return $this->db->insert('productos',$datos);
    }

    public function eliminar($id){
        $this->db->where("idProducto",$id);
        $this->db->delete("productos");
    }

    public function actualizar($id,$productoCodigo,$productoDescripcion,$ubicacion,$precio,$precioMayor,$fechaPrecio,$productoFoto,$unidad,$unidadPieza,$piezas){
        $datos= array(
            "productoCodigo"=>$productoCodigo,
            "productoDescripcion"=>$productoDescripcion,
            "ubicacion"=>$ubicacion,
            "precio"=>$precio,
            "precioMayor"=>$precioMayor,
            "fechaPrecio"=>$fechaPrecio,
            "productoFoto"=>$productoFoto,
            "unidad"=>$unidad,
            "unidadPieza"=>$unidadPieza,
            "piezas"=>$piezas
        );
        $this->db->where("idProducto",$id);
        $this->db->update("productos",$datos);
    }

    public function productos($subgrupo){
        $this->db->where("subgrupo",$subgrupo);
        return $this->db->get("productos")->result();
        
    }

    public function filtrarproductos($subgrupo,$producto){
        $this->db->where("subgrupo",$subgrupo);
        $this->db->like("productoDescripcion",$producto);
        return $this->db->get("productos")->result();
    }


    public function buscarsubgrupo($subgrupo){
        $query = $this->db->select("g.grupoDescripcion,d.disciplinaDescripcion,g.idGrupo,g.disciplina,sg.idSubgrupo,
                                        sg.subgrupoDescripcion,sg.subgrupoCodigo,g.grupoCodigo,d.disciplinaCodigo")
                          ->from("subgrupos as sg")
                          ->join("grupos as g", "sg.grupo = g.idGrupo", "inner")
                          ->join("disciplinas as d", "g.disciplina = d.idDisciplina", "inner")
                          ->where("sg.idSubgrupo",$subgrupo)
                          ->get();
      
        return $query->row();
    }

    public function contarproductos($subgrupo){
        $this->db->where("subgrupo",$subgrupo);
        return $this->db->get('productos')->num_rows();
        
    }
}
?>