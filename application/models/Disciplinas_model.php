<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Disciplinas_model extends CI_Model{
    public function insertar($disciplinaCodigo,$disciplinaDescripcion){
        $datos= array(
            "disciplinaCodigo"=>$disciplinaCodigo,
            "disciplinaDescripcion"=>$disciplinaDescripcion
        );

        return $this->db->insert('disciplinas',$datos);
    }

    public function eliminar($id){
        $this->db->where("idDisciplina",$id);
        $this->db->delete("disciplinas");
    }

    public function actualizar($id,$disciplinaCodigo,$disciplinaDescripcion){
        $datos= array(
            "disciplinaCodigo"=>$disciplinaCodigo,
            "disciplinaDescripcion"=>$disciplinaDescripcion
        );
        $this->db->where("idDisciplina",$id);
        $this->db->update("disciplinas",$datos);
    }

    public function disciplinas(){
        return $this->db->get("disciplinas")->result();
        
    }

    

}
?>