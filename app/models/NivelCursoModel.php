<?php
class NivelCursoModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM nivel_curso;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM nivel_curso WHERE id_nivel_curso = :id");
        $this->db->bind(':id',$id, PDO::PARAM_INT);
        return $this->db->findOne();
    }

    public function findByRange($inicio, $maxResult){
        $this->db->query("SELECT * FROM nivel_curso LIMIT :inicio, :maxResult");
        $this->db->bind(':inicio',$inicio, PDO::PARAM_INT);
        $this->db->bind(':maxResult',$maxResult, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function create($datos){
        $this->db->query('INSERT INTO nivel_curso VALUES(:id_nivel_curso, :nivel_curso, :estado)');
        $this->db->bind(':id_nivel_curso',null);
        $this->db->bind(':nivel_curso', $datos['nivel_curso']);
        $this->db->bind(':estado', $datos['estado']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE nivel_curso SET nivel_curso = :nivel_curso, estado = :estado WHERE id_nivel_curso = :id ');
        $this->db->bind(':id', $datos['id_nivel_curso'],PDO::PARAM_INT);
        $this->db->bind(':nivel_curso', $datos['nivel_curso']);
        $this->db->bind(':estado', $datos['estado']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM nivel_curso WHERE id_nivel_curso = :id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function findActivos(){
        $this->db->query("SELECT * FROM nivel_curso WHERE estado=1;");
        return $this->db->findAll();
    }

    public function findNivelByCurso($id_curso){
        $this->db->query("SELECT * FROM nivel_curso nc INNER JOIN curso c ON c.nivel=nc.id_nivel_curso WHERE c.nivel IS NOT NULL AND c.id_curso=:id_curso;");
        $this->db->bind(':id_curso', $id_curso);
        return $this->db->findAll();
    }
}
?>