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

    public function findByRange($inicio, $maxResult){
        $this->db->query("SELECT * FROM matricula LIMIT :inicio, :maxResult");
        $this->db->bind(':inicio',$inicio, PDO::PARAM_INT);
        $this->db->bind(':maxResult',$maxResult, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function findForTable(){
        $this->db->query("SELECT m.id_matricula, c.id_curso, c.nombre_curso, c.nivel, p.id_participante, concat(p.nombres,' ',p.apellidos) AS nombre, m.estado, m.observaciones FROM matricula m JOIN curso c ON m.id_curso=c.id_curso JOIN participante p ON p.id_participante=m.id_participante");
        return $this->db->findAll();
    }

    public function findForTableCurso($curso){
        $this->db->query("SELECT m.id_matricula, c.id_curso, c.nombre_curso, c.nivel, p.id_participante, concat(p.nombres,' ',p.apellidos) AS nombre, m.estado, m.observaciones FROM matricula m JOIN curso c ON m.id_curso=c.id_curso JOIN participante p ON p.id_participante=m.id_participante WHERE m.id_curso=$curso ");
        return $this->db->findAll();
    }

    public function create($datos){
        $this->db->query('INSERT INTO matricula VALUES(:id_matricula, :id_curso, :id_participante, :estado, :observaciones) ;');
        $this->db->bind(':id_matricula', $datos['id_matricula']);
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
        $this->db->bind(':id',$datos['id_matricula']);
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

    public function updateDown($datos){
        $this->db->query('UPDATE matricula SET estado=0 WHERE id_matricula = :id ');
        $this->db->bind(':id', $datos);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function comprobar($datos){
        $this->db->query('SELECT count(id_matricula) as n_registros FROM matricula WHERE id_curso = :id_curso AND id_participante= :id_participante ;');
        $this->db->bind(':id_curso',$datos['id_curso']);
        $this->db->bind(':id_participante',$datos['id_participante']);
        return $this->db->findAll();
    }

    // SELECT c1.id_curso FROM curso c1, curso c2 WHERE c2.nombre_curso=c1.nombre_curso AND c2.cohorte=c1.cohorte AND c2.nivel=(c1.nivel=((3)+1))
    public function comprobarUpgrade($datos){
        $this->db->query('SELECT c2.id_curso FROM curso c1, curso c2 WHERE c2.nombre_curso=c1.nombre_curso AND c2.cohorte=c1.cohorte AND c2.nivel=(c1.nivel + 1) AND c1.id_curso=:id');
        $this->db->bind(':id',$datos);
        return $this->db->findAll();
    }

    // public function upgrade($datos){
    //     $this->db->query('INSERT INTO matricula VALUES(:id_matricula, :id_curso, :id_participante, :estado, :observaciones) ;');
    //     $this->db->bind(':id',$datos['id_matricula']);
    //     $this->db->bind(':id_curso',$datos['id_curso']);
    //     $this->db->bind(':id_participante',$datos['id_participante']);
    //     $this->db->bind(':estado',$datos['estado']);
    //     $this->db->bind(':observaciones',$datos['observaciones']);
    //     if($this->db->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

}
?>