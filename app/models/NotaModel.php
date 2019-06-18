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

    public function findByRange($inicio, $maxResult){
        $this->db->query("SELECT * FROM nota LIMIT :inicio, :maxResult");
        $this->db->bind(':inicio',$inicio, PDO::PARAM_INT);
        $this->db->bind(':maxResult',$maxResult, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function create($datos){
        $this->db->query('INSERT INTO nota VALUES(:id_nota, :id_participante, :id_modulos_curso, :nota1, :nota2, :nota3, :nota4, :nota5, :nota6, :observaciones) ;');
        $this->db->bind(':id_nota',null);
        $this->db->bind(':id_participante',$datos['id_participante']);
        $this->db->bind(':id_modulos_curso',$datos['id_modulos_curso']);
        $this->db->bind(':nota1',$datos['nota1']);
        $this->db->bind(':nota2',$datos['nota2']);
        $this->db->bind(':nota3',$datos['nota3']);
        $this->db->bind(':nota4',$datos['nota4']);
        $this->db->bind(':nota5',$datos['nota5']);
        $this->db->bind(':nota6',$datos['nota6']);
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

    public function findByCursoModulo($id_curso, $id_modulo){
        $this->db->query("SELECT * FROM nota n INNER JOIN modulos_curso mc ON n.id_modulos_curso=mc.id_modulos_curso INNER JOIN modulo m ON mc.id_modulo=m.id_modulo INNER JOIN curso c ON mc.id_curso=c.id_curso;");
        $this->db->bind(':id',$id_curso);
        $this->db->bind(':id',$id_modulo);
        return $this->db->findAll();
    }


}
?>