<?php
class ModulosCursoModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM modulos_curso;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM modulos_curso WHERE id_modulos_curso = :id ;");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function create($datos){
        $this->db->query('INSERT INTO modulos_curso FROM VALUES(:id_modulos_curso, :id_curso, :id_modulo, :id_docente, :observaciones) ;');
        $this->db->bind(':id_curso',$datos['id_curso']);
        $this->db->bind(':id_modulo',$datos['id_modulo']);
        $this->db->bind(':id_docente',$datos['id_docente']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE modulos_curso SET id_curso=:id_curso, id_modulos=:id_modulos, id_docente=:id_docente, observaciones=:observaciones WHERE id_modulos_curso = :id ;');
        $this->db->bind(':id_modulos_curso',$datos['id_modulos_curso']);
        $this->db->bind(':id_curso',$datos['id_curso']);
        $this->db->bind(':id_modulo',$datos['id_modulo']);
        $this->db->bind(':id_docente',$datos['id_docente']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM modulos_curso WHERE id_modulos_curso = :id ;');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>