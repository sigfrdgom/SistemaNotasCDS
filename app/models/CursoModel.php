<?php
class CursoModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM curso;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM curso WHERE id_curso = :id");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function findByRange($inicio, $maxResult){
        $this->db->query("SELECT * FROM curso LIMIT :inicio, :maxResult");
        $this->db->bind(':inicio',$inicio, PDO::PARAM_INT);
        $this->db->bind(':maxResult',$maxResult, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function count(){
        $this->db->query("SELECT COUNT(*) AS n_registros FROM curso;");
        return $this->db->findAll();
    }


    public function create($datos){
        $this->db->query('INSERT INTO curso VALUES(:id_curso, :nombre_curso, :cohorte, :descripcion, :duracion, :sede, :estado, :nivel, :fecha_inicio, :fecha_fin)');
        $this->db->bind(':id_curso', $datos['id_curso']);
        $this->db->bind(':nombre_curso', $datos['nombre_curso']);
        $this->db->bind(':cohorte', $datos['cohorte']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        $this->db->bind(':duracion', $datos['duracion']);
        $this->db->bind(':sede', $datos['sede']);
        $this->db->bind(':estado', $datos['estado']);
        $this->db->bind(':nivel', $datos['nivel']);
        $this->db->bind(':fecha_inicio', $datos['fecha_inicio']);
        $this->db->bind(':fecha_fin', $datos['fecha_fin']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE curso SET nombre_curso = :nombre_curso, cohorte = :cohorte, descripcion = :descripcion,  duracion= :duracion, sede=:sede, estado=:estado, nivel=:nivel, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin WHERE id_curso = :id ');
        $this->db->bind(':id', $datos['id_curso']);
        $this->db->bind(':nombre_curso', $datos['nombre_curso']);
        $this->db->bind(':cohorte', $datos['cohorte']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        $this->db->bind(':duracion', $datos['duracion']);
        $this->db->bind(':sede', $datos['sede']);
        $this->db->bind(':estado', $datos['estado']);
        $this->db->bind(':nivel', $datos['nivel']);
        $this->db->bind(':fecha_inicio', $datos['fecha_inicio']);
        $this->db->bind(':fecha_fin', $datos['fecha_fin']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM curso WHERE id_curso = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function orderByFechaDesc(){
        $this->db->query("SELECT * FROM curso ORDER BY fecha_inicio DESC");
        return $this->db->findAll();
    }

    public function updateDown($datos){
        $this->db->query('UPDATE curso SET estado=0 WHERE id_curso = :id ');
         $this->db->bind(':id', $datos);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }



    public function countParticipante($id = ""){
        $this->db->query("SELECT COUNT(*) as participantes  FROM curso c inner join matricula m ON c.id_curso=m.id_curso inner join participante p ON m.id_participante=p.id_participante where c.id_curso=:id;");
        $this->db->bind(':id',$id);
        return $this->db->findAll();
    }


}

?>
