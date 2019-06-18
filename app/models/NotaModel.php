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

    public function replace($datos){
        $this->db->query('REPLACE INTO nota VALUES(:id_nota, :id_participante, :id_modulos_curso, :nota1, :nota2, :nota3, :nota4, :nota5, :nota6, :observaciones) ;');
        $this->db->bind(':id_nota',$datos['id_nota']);
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
        $this->db->bind(':id_curso',$id_curso);
        $this->db->bind(':id_modulo',$id_modulo);
        return $this->db->findAll();
    }

    public function findNotasEstudiantes($datos){
        $this->db->query('SELECT n.id_nota, n.id_participante, n.id_modulos_curso, n.nota1, n.nota2, n.nota3, n.nota4, n.nota4, n.nota5, n.nota6, n.observaciones, p.nombres, p.apellidos, mc.id_curso, mc.id_modulo, mc.id_docente FROM participante p INNER JOIN nota n ON p.id_participante = n.id_participante INNER JOIN modulos_curso mc ON n.id_modulos_curso= mc.id_modulos_curso INNER JOIN curso c ON mc.id_curso = c.id_curso INNER JOIN modulo mo ON mc.id_modulo=mo.id_modulo WHERE mc.id_curso=:id_curso AND mc.id_modulo=:id_modulo AND c.estado=1 AND mo.estado=1');
        $this->db->bind(':id_curso', $datos['id_curso'],PDO::PARAM_INT);
        $this->db->bind(':id_modulo', $datos['id_modulo'],PDO::PARAM_INT);
        return $this->db->findAll();
    }


}
?>