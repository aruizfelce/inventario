<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subgrupos_model extends CI_Model{
    public function insertar($subgrupoCodigo,$subgrupoDescripcion,$grupo){
        $datos= array(
            "subgrupoCodigo"=>$subgrupoCodigo,
            "subgrupoDescripcion"=>$subgrupoDescripcion,
            "grupo"=>$grupo
        );

        return $this->db->insert('subgrupos',$datos);
    }

    public function eliminar($id){
        $this->db->where("idSubgrupo",$id);
        $this->db->delete("subgrupos");
    }

    public function actualizar($id,$subgrupoCodigo,$subgrupoDescripcion){
        $datos= array(
            "subgrupoCodigo"=>$subgrupoCodigo,
            "subgrupoDescripcion"=>$subgrupoDescripcion
        );
        $this->db->where("idSubgrupo",$id);
        $this->db->update("subgrupos",$datos);
    }

    public function subgrupos($grupo){
        $this->db->where("grupo",$grupo);
        return $this->db->get("subgrupos")->result();
        
    }

    public function buscargrupo($grupo){
        $query = $this->db->select("g.grupoDescripcion,d.disciplinaDescripcion,g.idGrupo,g.disciplina")
                          ->from("grupos as g")
                          ->join("disciplinas as d", "g.disciplina = d.idDisciplina", "inner")
                          ->where("g.idGrupo",$grupo)
                          ->get();
      
        return $query->row();
    }

}
?>