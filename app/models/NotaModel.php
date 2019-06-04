<?php
class NotaModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM nota;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM nota WHERE id_nota = :id ;");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function create($datos){
        $this->db->query('INSERT INTO nota VALUES(:id_nota, :id_participante, :id_modulos_curso, :notas_modulo, :nota_final, :observaciones) ;');
        $this->db->bind(':id_participante',null);
        $this->db->bind(':id_modulos_curso',$datos['id_modulos_curso']);
        $this->db->bind(':notas_modulo',$datos['notas_modulo']);
        $this->db->bind(':nota_final',$datos['notas_final']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE nota SET id_participante=:id_participante, id_modulos_curso=:id_modulos_curso, notas_modulo=:notas_modulo, nota_final=:nota_final, observaciones=:observaciones WHERE id_nota = :id ;');
        $this->db->bind(':id_participante',$datos['id_participante']);
        $this->db->bind(':id_modulos_curso',$datos['id_modulos_curso']);
        $this->db->bind(':notas_modulo',$datos['notas_modulo']);
        $this->db->bind(':nota_final',$datos['notas_final']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM nota WHERE id_nota = :id ;');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}
?>