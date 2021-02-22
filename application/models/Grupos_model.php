<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Grupos_model extends CI_Model{
    public function insertar($grupoCodigo,$grupoDescripcion,$disciplina){
        $datos= array(
            "grupoCodigo"=>$grupoCodigo,
            "grupoDescripcion"=>$grupoDescripcion,
            "disciplina"=>$disciplina
        );

        return $this->db->insert('grupos',$datos);
    }

    public function eliminar($id){
        $this->db->where("idGrupo",$id);
        $this->db->delete("grupos");
    }

    public function actualizar($id,$grupoCodigo,$grupoDescripcion){
        $datos= array(
            "grupoCodigo"=>$grupoCodigo,
            "grupoDescripcion"=>$grupoDescripcion
        );
        $this->db->where("idGrupo",$id);
        $this->db->update("grupos",$datos);
    }

    public function grupos($disciplina){
        $this->db->where("disciplina",$disciplina);
        return $this->db->get("grupos")->result();
        

    }
    public function buscardisciplina($disciplina){
        $this->db->select("disciplinaDescripcion");
        $this->db->where("idDisciplina",$disciplina);
        return $this->db->get("disciplinas")->row();
        
    }

}
?>