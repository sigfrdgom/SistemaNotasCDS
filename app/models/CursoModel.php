<?php
class CursoModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM curso ORDER BY cohorte ASC;");
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

    public function orderByCohorteNivel(){
        $this->db->query("SELECT * FROM curso ORDER BY cohorte DESC, nivel DESC");
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

    public function buscarCurso($busqueda){
        //SELECT * FROM curso WHERE nombre_curso LIKE '%C%' LIMIT 0, 10
        $this->db->query("SELECT * FROM curso WHERE nombre_curso LIKE :busqueda LIMIT 0, 10");
        $busqueda = "%{$busqueda}%";
        $this->db->bind(':busqueda', $busqueda, PDO::PARAM_STR);
        return $this->db->findAll();
    }

    public function cursoSinPorcentaje(){
        $this->db->query("SELECT c.id_curso, c.nombre_curso, c.nivel FROM curso c LEFT JOIN porcentajes_curso pc ON c.id_curso = pc.id_curso WHERE pc.id_curso IS NULL AND c.estado=1");
        return $this->db->findAll();
    }

    public function cursoConPorcentaje(){
        $this->db->query("SELECT DISTINCT(pc.id_curso), c.nombre_curso, c.cohorte, c.nivel FROM curso c LEFT JOIN porcentajes_curso pc ON c.id_curso = pc.id_curso WHERE pc.id_curso IS NOT NULL AND c.estado=1 ORDER BY c.cohorte ASC");
        return $this->db->findAll();
    }

    public function findByCohorte(){
        $this->db->query("SELECT DISTINCT cohorte, nombre_curso, sede from curso ORDER by cohorte ASC");
        return $this->db->findAll();
    }

    public function findByNivel($cohorte){
        $cohorte = base64_decode($cohorte);
        $this->db->query("SELECT * FROM curso WHERE cohorte='$cohorte' ORDER BY nivel ASC");
        return $this->db->findAll();
    }

    public function comprobar($cohorte,$nivel){
        $this->db->query("SELECT COUNT(id_curso) as n_registros FROM curso WHERE cohorte = :cohorte and nivel=:nivel");
        $this->db->bind(':cohorte',$cohorte);
        $this->db->bind(':nivel',$nivel+1);
        return $this->db->findOne();
    }

    public function findByCriteria($datos){
        
        $this->db->query("SELECT * FROM curso WHERE id_curso=:id_curso OR nombre_curso LIKE :busqueda OR cohorte LIKE :busqueda ORDER BY cohorte ASC");
        $this->db->bind(':id_curso',$datos['id_curso']);
        $busqueda = "%".$datos['busqueda']."%";
        $this->db->bind(':busqueda', $busqueda, PDO::PARAM_STR);
        return $this->db->findAll();
    }

    
}

?>
