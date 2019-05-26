<?php
class MatriculaModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM matricula;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM matricula WHERE id_matricula = :id ;");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function create($datos){
        $this->db->query('INSERT INTO matricula FROM VALUES(:id_matricula, :id_curso, :id_participante, :estado, :observaciones) ;');
        $this->db->bind(':id_curso',$datos['id_curso']);
        $this->db->bind(':id_participante',$datos['id_participante']);
        $this->db->bind(':estado',$datos['estado']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE matricula SET id_curso=:id_curso, id_participante=:id_participante, estado=:estado, observaciones=:observaciones WHERE id_matricula = :id ;');
        $this->db->bind(':id_matricula',$datos['id_matricula']);
        $this->db->bind(':id_curso',$datos['id_curso']);
        $this->db->bind(':id_participante',$datos['id_participante']);
        $this->db->bind(':estado',$datos['estado']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM matricula WHERE id_matricula = :id ;');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>